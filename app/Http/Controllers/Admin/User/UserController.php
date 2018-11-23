<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use App\Role;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::oldest()->paginate(6);
  
        return view('admin.users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if((!$request->name) || (!$request->email) || (!$request->password)){
            return redirect()->route('admin.users.index')
            ->with('error','Unable to create User.');
        }
        else
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed']
            ]);
            
            $user_image = $request->file('image');
            $file_route = time().'_'.$user_image->getClientOriginalName();
            Storage::disk('users')->put( $file_route, file_get_contents( $user_image->getRealPath() ) );
        
            $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
            'image' => trim($file_route)
                        ]);
                        
            $user->roles()->attach(Role::where('name', 'user')->first());

            return redirect()->action('Admin\User\UserController@index')->with('success','User created successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if((!$request->name) || (!$request->email)){
            return redirect()->route('users.index')
            ->with('error','Unable to update User.');
        }
        else
        {
            if(!$user->id){
                return redirect()->route('users.index')
                ->with('error','Unable to find User.');
            }
            else
            {
                $user = User::find($user->id);

                $prev_image = $user->image;

                $user->name = trim($request->name);
                $user->email = trim($request->email);
                
                if($request->hasFile('image')){
                                        
                                        Storage::disk('users')->delete($prev_image);

                    $user_image = $request->image;
                    $file_route = time().'_'.$user_image->getClientOriginalName();
                    Storage::disk('users')->put( $file_route, file_get_contents( $user_image->getRealPath() ) );  
                    $user->image = trim($file_route);
                }
                else{
                    $user->image = trim($prev_image);
                    $hasfl = 'No File attached'; 
                }

                $user->save();
                $user_image = $request->image;
                
                return redirect()->action('Admin\User\UserController@index')->with('success','User updated successfully.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$user->id){
            return redirect()->route('users.index')
            ->with('error','Unable to delete User.');
        }
        else
        {
            $user_delete = User::find($user->id);
            $prev_image = $user_delete->image;
            
            if ( $user->where('id', $user->id)->delete() ) {
                Storage::disk('users')->delete($prev_image);
                DB::table('role_user')->where('user_id', '=', $user->id)->delete();  
            }

            return redirect()->action('Admin\User\UserController@index')->with('success','User deleted successfully.');
        }
    }
}
