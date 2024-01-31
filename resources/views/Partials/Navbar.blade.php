


@auth
{{--  //jika sudah login  --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Company</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  {{ ($active==="Post")?'active':'' }}  {{ ($active==="Category")?'active':'' }}" href="{{ route('posts.index') }}" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Post
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ ($active==="Post")?'active':'' }}" href="{{ route('posts.index') }}">Post</a></li>
              <li><a class="dropdown-item {{ ($active==="Category")?'active':'' }}" href="{{ route('categorys.index') }}">Category Post</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($active==="CategoryProduct")?'active':'' }} {{ ($active==="Product")?'active':'' }}" href="{{ route('posts.index') }}" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Product
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ ($active==="Product")?'active':'' }}" href="{{ route('products.index') }}">Product</a></li>
              <li><a class="dropdown-item {{ ($active==="CategoryProduct")?'active':'' }}" href="{{ route('categoryproducts.index') }}">Category Product</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($active==="Country")?'active':'' }} {{ ($active==="Country")?'active':'' }}" href="{{ route('categoryproducts.index') }}" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Country
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ ($active==="Country")?'active':'' }}" href="{{ route('countrys.index') }}">Country</a></li>
              <li><a class="dropdown-item {{ ($active==="Country")?'active':'' }}" href="{{ route('shippingcosts.index') }}">Shepping Country</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($active==="Member")?'active':'' }}" aria-current="page" href="{{ route('members.index') }}">Member</a>

          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($active==="About")?'active':'' }}" href="{{ route('abouts.index') }}">About</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
            <form action="/logout" method="POST">
                @csrf
            <li class="nav-item">  <button type="submit" class="nav-link bi bi-box-arrow-right {{ ($active==="logout")?'active':'' }}"> Logout</button></li>
            </form>
        </ul>
      </div>
    </div>
  </nav>

@else
{{--  //jika belum login  --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Company</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"> <a class="nav-link bi bi-box-arrow-in-right {{ ($active==="login")?'active':'' }}" href="/"> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

@endauth
