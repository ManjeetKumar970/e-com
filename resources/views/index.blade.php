<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

    @include('partials.header')

    @include('partials.slider')
    <!-- Hero Section -->
    <section class="container-fluid">

        <!-- Browse by Category -->
        @include('partials.browsebycategory')
        <!-- Browse by Category -->


        @include('partials.bestseller')

        <!-- Hot Deals -->

        @include('partials.hotdeals')

        <!-- Restaurant Solutions -->
        @include('partials.restaurantsolutions')
    </section>
    <!-- Experience the Difference -->
    @include('partials.experience')
    <!-- Footer -->
</body>
@include('partials.notificationbell')
@include('partials.footer')
