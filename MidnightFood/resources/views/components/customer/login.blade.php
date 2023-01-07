<div class="modal fade" id="loginModal" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="{{ route('Login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="username" class="form-control" placeholder="Your username...">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Your password...">
                        </div>
                        @if($errors->any())
                            <div class="text-danger">The account does not exists</div>
                        @endif
                        <button type="submit" class="btn btn-dark btn-block btn-round">Sign in</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet?
                    <a href="{{ route('Register.form') }}" class="text-info"> Sign Up</a></div>
            </div>
        </div>
    </div>
</div>

