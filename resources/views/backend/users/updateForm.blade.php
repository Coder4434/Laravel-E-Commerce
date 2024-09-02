@extends('layouts.user.index')


@section('content')
    <style>
        .form-group {
            margin-bottom: 10px;

        }

        .input-field {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        th {
            background-color: rgb(2, 3, 27);
            color: white;
        }
    </style>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

        <div class="row">
            <h2 class="">Kullanıcı Düzenleme</h2>

        </div>
        <div id="panel-edit" class="panel">
            <form class="add-form" style="display: flex; flex-direction: column; align-items: center;"
                action="{{ route('destroy-user', ['id' => $user->user_id]) }}" method="POST">
                @csrf
                <div class="row" style="width: 100%;">
                    <div class="col">
                        <div class="form-group">
                            <label for="dersAdi">Ad-Soyad:</label>
                            <input type="text" id="username" name="username" class="input-field"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="dersDonem">Email:</label>
                            <input type="text" id="email" name="email" class="input-field"
                                value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label style="display: inline-block;" for="dersSinifi">Admin:
                                <input style="margin: -5px; padding:-5px;" type="checkbox" id="isAdmin" name="isAdmin"
                                    value="1" {{ isset($user) && $user->is_admin ? 'checked' : '' }}
                                    class="input-field">
                            </label>

                        </div>
                        <div class="form-group">
                            <label style="display: inline-block;" for="isActive">Aktif:
                                <input style="margin: -5px; padding:-5px;" type="checkbox"
                                    value="1"{{ isset($user) && $user->is_active ? 'checked' : '' }} id="isActive"
                                    name="isActive" class="input-field"></label>

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 20px;"
                    onclick="return validatePassword()">Kullanıcı Bilgisini Düzenle</button>
            </form>
        </div>




    </main>
@endsection
