@if(Auth::check()&& Auth::user()->level =="admin")
<ul class="nav">
    <li>
        <a href="/">
            <i class="tim-icons icon-bank"></i>
            <p>Home</p>
        </a>
    </li>
    <li>
        <a href="/about">
            <i class="tim-icons icon-spaceship"></i>
            <p>About</p>
        </a>
    </li>
    <li>
        <a href="/news">
            <i class="tim-icons icon-align-left-2"></i>
            <p>News</p>
        </a>
    </li>
    <li>
        <a href="/blog">
            <i class="tim-icons icon-bold"></i>
            <p>Blog</p>
        </a>
    </li>
    <li>
        <a href="/mahasiswa">
            <i class="tim-icons icon-badge"></i>
            <p>Mahasiswa</p>
        </a>
    </li>
    <li>
        <a href="/buku">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>Buku</p>
        </a>
    </li>
    <li>
        <a href="/users">
            <i class="tim-icons icon-single-02"></i>
            <p>Users</p>
        </a>
    </li>
    <li>
        <a href="/galeri">
            <i class="tim-icons icon-components"></i>
            <p>Galeri</p>
        </a>
    </li>
    <li>
        <a href="/list_buku">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>Buku SEO</p>
        </a>
    </li>
</ul>
@else

<ul class="nav">
    <li>
        <a href="/">
            <i class="tim-icons icon-bank"></i>
            <p>Home</p>
        </a>
    </li>
    <li>
        <a href="/about">
            <i class="tim-icons icon-spaceship"></i>
            <p>About</p>
        </a>
    </li>
    <li>
        <a href="/news">
            <i class="tim-icons icon-align-left-2"></i>
            <p>News</p>
        </a>
    </li>
    <li>
        <a href="/blog">
            <i class="tim-icons icon-bold"></i>
            <p>Blog</p>
        </a>
    </li>
    <li>
        <a href="/mahasiswa">
            <i class="tim-icons icon-badge"></i>
            <p>Mahasiswa</p>
        </a>
    </li>
    <li>
        <a href="/buku">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>Buku</p>
        </a>
    </li>
    <li>
        <a href="/list_buku">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>Buku SEO</p>
        </a>
    </li>
   

</ul>
@endif