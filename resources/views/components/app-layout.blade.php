<!DOCTYPE html>
<html lang="en">

<x-app-head />

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <header>
                <x-app-header />
            </header>
            <x-app-menu />
            {{$slot}}
            <footer />
        </div>
    </div>
</body>

<x-app-library />

</html>