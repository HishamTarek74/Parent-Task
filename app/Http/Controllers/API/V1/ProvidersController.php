<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Abstraction\Interfaces\UserResourceInterface;
use App\Http\Abstraction\Interfaces\UsersRepositoryInterface;
use App\Http\Abstraction\Interfaces\FilteringUserInterface;
use Illuminate\Http\Request;

class ProvidersController
{
    public function index(Request $request, UsersRepositoryInterface $usersRepository,
                          UserResourceInterface $userResource, FilteringUserInterface $filteringUser)
    {
        $data = [];
        while ($user = $usersRepository->currentObject()) {
            $filteringUser
                ->setUser($user)
                ->applyStatus($request->get('statusCode'))
                ->applyCurrency($request->get('currency'))
                ->applyAmount($request->get('balanceMin'), $request->get('balanceMax'));

            if ($filteringUser->isValid()) {
               // dd($user);
                $data[] = $userResource
                    ->setUser($user)
                    ->transform();
            }
            $usersRepository->next();
        }

        return $data ? response()->json(['providers' => $data], 200) : response()->json(null, 204);
    }
}
