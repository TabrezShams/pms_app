<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request,  Closure $next)
    {
        if(auth()->user()->role_id  == 1){
            return $next($request);
        }
        elseif(auth()->user()->role_id  == 2)
        {
           if($request->route()->getName() == 'posts.edit' ||
                $request->route()->getName() == 'posts.destroy'){

                $data = $request->route()->parameters();

                $id = (int)$data['posts'];

                $post = Post::findOrFail($id);

                if($post && $post->user_id == auth()->user()->id){

                    return $next($request);
                    

                }else{
                    return redirect()->back()->withErrors(['error' => 'This request cannot be processed']);
                }
                
            }
            elseif($request->route()->getName() == 'user.index' ||
                   $request->route()->getName() == 'user.edit'  ||
                   $request->route()->getName() == 'user.destroy' ||
                   $request->route()->getName() == 'user.create')
            {
                return redirect()->back()->withErrors(['error' => 'This request cannot be processed']);
            }
            else
            {
            //dump($request->route()->getName());

            return $next($request);
            }
        }
        else{
            if($request->route()->getName() == 'posts.index' ||
               $request->route()->getName() == 'posts.show'  ||
               $request->route()->getName() == 'comments.store')
            {
                return $next($request);
            }
            return redirect()->back()->withErrors(['error' => 'This request cannot be processed']);
        }
    }
}
