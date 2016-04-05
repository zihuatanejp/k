<?php namespace App\Http\Middleware;

use Closure;

class TesMiddle {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		echo $request.'<br><br>';
		echo $request->phone;
		if($request->input('age') < 200){
			// return redirect('welcome');
			echo $request->input('age').'<br>';
		}
		return $next($request);
	}

}
