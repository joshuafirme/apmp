<table class="table table-borderless table-hover">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Link</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if (count($slider_banner))
    @foreach ($slider_banner as $item)
      <tr id="record-id-{{$item->id}}">
        <td><div class='photo-thumb' style='background: url({{ asset($item->image) }}) 50% 50% no-repeat; background-size:cover;'></div></td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->link }}</td>
        <td>
          <a class="btn btn-edit open-modal" modal-type="update" data-info="{{ json_encode($item)}} " data-bs-toggle="modal" data-bs-target="#sliderBannerModal"><i class="bx bx-edit"></i></a>
          <a class="btn delete-record" data-id="{{ $item->id }}" object="slider/banner" data-bs-toggle="modal" data-bs-target="#delete-record-modal">
            <i class="bx bx-trash" style="color: red;"></i>
          </a>
        </td>
      </tr> 
    @endforeach
    @else
    <tr>
      <td colspan="6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          No data found.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </td>
    </tr>
    @endif

  </tbody>
</table>
<!-- End Tables without borders -->

@php
echo $slider_banner->links("pagination::bootstrap-4");
@endphp
