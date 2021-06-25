<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
class RoleMiddleware
{
    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en','sr'];
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * The availables languages.
     *
     * @array $languages
     */
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($this->auth->check()) {
            $roles = explode('|', $role);
            $checker = false;
            foreach($roles as $one){
                if ($request->user()->hasRole($one)) {
                    $checker = true;
                }
            }
            if($checker === false){
                return abort('401');
            }
            return $next($request);
        }
        return redirect('admin/login');
    }
}
