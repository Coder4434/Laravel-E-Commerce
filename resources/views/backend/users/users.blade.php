@extends('layouts.user.index')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
        <div class="row">

            <h2 class="col-10">Kullanıcılar</h2>

            <button type="button" class="btn btn-primary col-2 " style="width:120px;height :50px text-align:center">Kullanıcı ekle</button>

        </div>

        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        <div class="table-responsive small mt-4" >
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
@endsection
