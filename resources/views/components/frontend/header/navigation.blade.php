@props(['categories'])

<div class="bottom-header">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="main-menu">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                        <div class="collapse navbar-collapse" id="gazetteMenu">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Today <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('frontend.home') }}">Home</a>
                                        {{--<a class="dropdown-item" href="{{ route('frontend.category') }}">Category</a>
                                        <a class="dropdown-item" href="{{ route('frontend.single-post') }}">Single Post</a>
                                        <a class="dropdown-item" href="{{ route('frontend.about-us') }}">About Us</a>
                                        <a class="dropdown-item" href="{{ route('frontend.contact') }}">Contact</a>--}}
                                    </div>
                                </li>
                                {{--Dynamische categorieën--}}
                                @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Search Form -->
                            <div class="header-search-form mr-auto">
                                <form action="#">
                                    <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                    <input class="d-none" type="submit" value="submit">
                                </form>
                            </div>

                            <div class="mr-3">
                                @can('ViewAdminPanel', App\Models\User::class)
                                    <a href="{{ route('backend.index') }}">Dashboard</a>
                                @endcan
                            </div>

                            <!-- Search btn -->
                            <div id="searchbtn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
