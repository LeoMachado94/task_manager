<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AccountsController extends Controller
{
    /**
     * Show account settings view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $account = Auth::user();
        return view('platform.accounts.edit', compact('account'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $tab = $request->input('tab');
        try {
            $user = Auth::user();

            if ($request->input('tab') === 'tab-general') {
                $request->validate([
                    'name' => 'required|string|max:192',
                    'email' => 'required|email|max:192|unique:users,email,'.$user->id
                ]);
            } else {
                if ($request->input('tab') === 'security') {
                    $request->validate([
                        'password' => [
                            'required',
                            'min:8',
                            'max:32',
                            Password::min(8)->letters()->numbers(),
                            'confirmed'
                        ],
                    ]);
                }

                $request->validate([
                    'biography' => 'nullable|string|max:192',
                    'birthdate' => 'nullable|date_format:d/m/Y',
                    'phone' => 'nullable|string|max:16',
                    'website' => 'nullable|url|max:192',
                    'gender' => 'nullable|integer',
                    'address' => 'nullable|string|max:192',
                    'address_number' => 'nullable|integer',
                    'address_district' => 'nullable|string|max:192',
                    'address_complement' => 'nullable|string|max:192',
                    'city' => 'nullable|string|max:192',
                    'state' => 'nullable|string|max:2',
                ]);
            }

            $data = $request->all();

            if ($request->input('tab') === 'address') {
                $user->personalAddress()->update($data);
            }

            if (
                empty($request->input('tab')) ||
                $request->input('tab') === 'general' ||
                $request->input('tab') === 'security' ||
                $request->input('tab') === 'info'
            ) {
                if (empty($request->input('tab')) || $request->input('tab') === 'general') {
                    if (!empty($request->hasFile('avatar'))) {
                        $fileName =  $user->id.'_'.time().'.'.$request->avatar->extension();
                        $request->file('avatar')->storeAs('users/avatars', $fileName, 'public');
                        $data['avatar'] = 'storage/users/avatars/'.$fileName;
                    }
                }

                if ($request->input('tab') === 'security') {
                    $data['password'] = bcrypt($data['password']);
                }
            }

            $user->update($data);
            return redirect()->route('account.settings', ['tab' => $tab])->with([
                'message' => 'Informaçõs atualizadas',
                'message_type' => 'success'
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('account.settings', ['tab' => $tab])->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->route('account.settings', ['tab' => $tab])->withInput()->with([
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ]);
        }
    }
}
