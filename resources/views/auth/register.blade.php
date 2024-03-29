<x-layout>

<div class="containter">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-3">Register Form</h3>
            <div class="card p-4 my-3">
                <form method="POST" >
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Name</label>
                      <input  type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')
                    }}" aria-describedby="emailHelp">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputUserName" class="form-label">User Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="{{old('username')}}" aria-describedby="emailHelp">
                      @error('username')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value=" {{ old('email')}}" aria-describedby="emailHelp">
                      @error('email')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password"  id="exampleInputPassword1">
                      @error('password')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>

</x-layout>
