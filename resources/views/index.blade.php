<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ranggacaw | Shortlink</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-6">
                    <h1 class="mt-5">Laravel Shorter Link</h1>
            
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Generated Link</label>
                            <p>
                                <a href="{{ route('generate.link', $latestRecord->code) }}" target="_blank" rel="noopener noreferrer">{{ route('generate.link', $latestRecord->code) }}</a>
                            </p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('generate.link.post')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Enter Link</label>
                                    <input type="text" name="link" id="" class="form-control mb-2" placeholder="https://github.com/">
                                    @error('link')
                                        <p class="text-danger mb-2">
                                            {{ $message }} 
                                        </p>
                                    @enderror
                                    <div class="col-auto">
                                      <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Generate</button>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                        
                        <div class="card-body d-none">
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Short Link</td>
                                            <td>Link</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shortLinks as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>
                                                    <a href="{{ route('generate.link', $row->code) }}" target="_blank" rel="noopener noreferrer">{{ route('generate.link', $row->code) }}</a>
                                                </td>
                                                <td>{{ $row->link }}</td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>