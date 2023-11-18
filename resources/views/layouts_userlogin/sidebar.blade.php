<ul class="nav nav-pills flex-column mb-auto">
    <li>
        <a href="/home" class="nav-link {{($title === 'Halaman Home') ? 'active' : ''}} text-white" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16">
                <use xlink:href="#home" />
            </svg>
            Home
        </a>
    </li>
    <li>
        <a href="/dashboard" class="nav-link {{($title === 'Halaman Dasboard') ? 'active' : ''}} text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
                <use xlink:href="#speedometer2" />
            </svg>
            Dashboard
        </a>
    </li>
    @if(Auth::user()->level_user == 0)
    <li>
        <a href="/transaksi" class="nav-link {{($title === 'Halaman Pemesanan Mobil') ? 'active' : ''}} text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
                <use xlink:href="#table" />
            </svg>
            Pemesanan Mobil
        </a>
    </li>
    @else
    <li>
        <a href="/mobils" class="nav-link {{($title === 'Halaman Data Mobil') ? 'active' : ''}} text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-lines-fill me-2" viewBox="0 0 16 16">
                <path
                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
            </svg>
            Data Mobil
        </a>
    </li>
    <li>
        <a href="/pengembalian" class="nav-link {{($title === 'Halaman Pengembalian Mobil') ? 'active' : ''}} text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-lines-fill me-2" viewBox="0 0 16 16">
                <path
                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
            </svg>
            Pengembalian Mobil
        </a>
    </li>

    @endif
    <li>
        <form method="post" action="{{url('/logout')}}">
            @csrf
            <button class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi bi-airplane-engines me-2" width="16" height="16" viewBox="0 0 16 16">
                    <path
                        d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0ZM7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1c.213 0 .458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7V3Z" />
                </svg>
                <?php $exp = explode('.', Auth::user()->username); ?>
                Logout ({{$exp[0]}})
            </button>
        </form>
    </li>
</ul>