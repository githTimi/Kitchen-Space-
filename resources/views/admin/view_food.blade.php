<!DOCTYPE html>
<html>

<head>

    @include('admin.css')
    <base href="/public">
    <style>
        table {
            border: 1px solid grey;
            margin: auto;
            width: 60%;
        }

        th {
            font-size: 20px;
            padding: 10px;
            background: skyblue;
            color: white;
            margin: 10px;
        }

        td {
            padding: 5px;
            background: lightgrey;
        }

        .food-card {
            background: #b8b0b0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            display: flex;
            flex-direction: column;
        }

        .food-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .food-img {
            width: 100%;
            height: 250px;
            object-fit: fill;
        }

        .food-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 4px;
            color: #0f4c81;
            /* brand color */
        }

        .food-price {
            font-size: 1rem;
            font-weight: 500;
            color: #12b886;
            margin-bottom: 6px;
        }

        .food-desc {
            font-size: 0.9rem;
            color: #555;
            margin: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .food-img {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container my-4">
                <div class="row g-4">
                    @foreach ($food as $food)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-5">
                            <div class="food-card h-150">
                                <img src="{{ asset('foodimage/' . $food->img) }}" class="food-img"
                                    alt="{{ $food->title }}">
                                <div class="p-3">
                                    <h5 class="food-name">{{ $food->title }}</h5>
                                    <p class="food-price">₦{{ number_format($food->price, 2) }}</p>
                                    <p class="food-desc">{{ Str::limit($food->details, 80) }}</p>
                                    <p>
                                    <form action="{{ route('food.destroy', $food->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            style="border:none;background:none;">
                                            <img width="50" src="{{ asset('foodimage/delete.png') }}"
                                                alt="Delete">
                                        </button>
                                    </form>
                                    <a href="{{ url('update_food', $food->id) }}" class='btn btn-danger'>Update </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        @include('admin.js')
</body>

</html>
