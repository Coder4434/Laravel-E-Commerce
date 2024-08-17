@extends('layouts.user.index')


@section('content')
    <style>
        .panel {
            display: none;
            padding: 20px;
            margin-top: 20px;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 30%;
            color: white;
            background-color: rgb(51, 49, 49);
            z-index: 9999;
            height: 400px;
            width: 800px;
            display: none;
            flex-direction: column;
            align-items: center;
            border: 2px solid #ccc;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            width: auto;
            text-align: center;
        }

        .panel {
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .add-form {
            margin-top: 20px;
            border: 0px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

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

            <h2 class="col-10">Kullanıcılar</h2>

            <button type="button" id ="liste" class="btn-primary "
                style="width:120px;height :50px text-align:center">Kullanıcı ekle</button>

        </div>

        <div id="panel" class="panel">

            <button class="btn " id="kapatma" type="button"
                style="position: absolute; top:5px; margin-right:20px; right: 0; background-color: red; color: white;">X</button>

            <form class="add-form" style="display: flex; flex-direction: column; align-items: center;"
                action="{{ route('add-user') }}" method="POST">
                @csrf
                <div class="row" style="width: 100%;">
                    <div class="col">
                        <div class="form-group">
                            <label for="dersAdi">Ad-Soyad:</label>
                            <input type="text" id="username" name="username" class="input-field">
                        </div>
                        <div class="form-group">
                            <label for="dersDonem">Email:</label>
                            <input type="text" id="email" name="email" class="input-field">
                        </div>
                        <div class="form-group">
                            <label style="display: inline-block;" for="dersSinifi">Admin:
                                <input style="margin: -5px; padding:-5px;" type="checkbox" id="isAdmin" name="isAdmin"
                                    class="input-field">
                            </label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Şifre:</label>
                            <input type="password" id="password" name="password" class="input-field" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordCheck">Şifre Tekrar:</label>
                            <input type="password" id="passwordCheck" name="passwordCheck" class="input-field" required>
                        </div>
                        <div id="passwordError" style="color: red; display: none;">
                            Şifreler uyuşmuyor. Lütfen tekrar deneyin.
                        </div>
                        <div class="form-group">
                            <label style="display: inline-block;" for="isActive">Aktif:
                                <input style="margin: -5px; padding:-5px;" type="checkbox" id="isActive" name="isActive"
                                    class="input-field"></label>

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 20px;" onclick="return validatePassword()">Ders Bilgisini Ekle</button>
            </form>
        </div>

        <div class="table-responsive small mt-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad-Soyad</th>
                        <th scope="col">E-posta</th>
                        <th scope="col">Durum</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_active }}</td>
                                <td>{{ $user->last_activity }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5"> Kullanıcı Bulunamadı</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


    </main>

    <script>
        function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordCheck = document.getElementById("passwordCheck").value;
        var passwordError = document.getElementById("passwordError");

        if (password !== passwordCheck) {
            passwordError.style.display = "block"; // Uyarıyı göster
            return false; // Formun gönderilmesini engelle
        } else {
            passwordError.style.display = "none"; // Uyarıyı gizle
            return true; // Formun gönderilmesine izin ver
        }
    }

        document.addEventListener('DOMContentLoaded', function() {
            const panel = document.getElementById('panel');
            const liste = document.getElementById('liste');
            const kapatma = document.getElementById('kapatma');

            liste.addEventListener('click', function(event) {
                event.preventDefault();
                panel.style.display = 'block';
            });
            kapatma.addEventListener('click', function(event) {
                event.preventDefault();
                panel.style.display = 'none';
            });
        });
    </script>
@endsection
