

            <h4>Data:</h4><br>
            <!-- <a class="btn btn-primary" href="{{ URL::to('chalets/create') }}">voeg Chalet toe</a> -->
            <hr>
            
            @foreach ($chaletData as $chalet)
              <td>{{ $chalet->name }}</td>
              <td>{{ $chalet->description}}</td>
              <td>{{ $chalet->price}}</td>
<!--                <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary">Edit</a></td>
                @csrf
              <form action="{{ route('chalets.destroy', $chalet->id)}}" method="post">
                 @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button> -->
              <hr>
           @endforeach





