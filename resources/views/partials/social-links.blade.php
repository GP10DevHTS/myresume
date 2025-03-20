@if ($user->twitter)
    <a href="{{ $user->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
@endif
@if ($user->facebook)
    <a href="{{ $user->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
@endif
@if ($user->instagram)
    <a href="{{ $user->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
@endif
@if ($user->linkedin)
    <a href="{{ $user->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
@endif
@if ($user->github)
    <a href="{{ $user->github }}" class="github"><i class="bi bi-github"></i></a>
@endif
