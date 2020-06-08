<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Alert;
   
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_admin == 1){
            return $next($request);
        } else {
            return back()->with('toast_error', auth()->user()->name.' tidak memiliki akses admin !!');
        }
    }
}