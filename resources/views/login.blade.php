<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
 
  
  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <img class="mx-auto h-32 w-auto ml-0 mb-4" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <a role="button" class="btn-sm">Link</a>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="email" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="text" placeholder="password" class="input input-bordered" />
            <label class="label">
              <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
            </label>
          </div>
          <div class="form-control mt-1">
            <button class="btn btn-primary">Login</button>
          </div>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="label-text">Remember me</span> 
              <input type="checkbox" checked="checked" class="checkbox checkbox-primary" />
            </label>
          </div>
          <p class="mt-10 text-center text-sm text-indigo-50">
            Not a member?
            <a href="register" class="font-semibold leading-6 text-indigo-50 hover:text-indigo-500">Sign Up !</a>
          </p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>