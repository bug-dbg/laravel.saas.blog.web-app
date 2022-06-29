<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Closure;
use Illuminate\Http\Request;

class UserAccessEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $team_id = $user->current_team_id;

        $team = Team::find($team_id);
        
        if (!$user->hasTeamPermission($team, 'update')) 
        {
            dd($user->hasTeamPermission($team, 'update'));
            /* abort(401, 'You don\'t have permission'); */
        }

        
        return $next($request);
    }
}
