
@php
    $header = json_decode(Cache::get('header_cache'));
@endphp

<form action="/manage-site/homepage-settings/update-header" method="post" class="row g-3">
    @csrf
      <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ isset($header->title) ? $header->title : "" }}" required>
      </div>
      <div class="col-md-12 mt-4">
        <label>Visibility</label>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="projects" 
          {{ isset($header->projects) && $header->projects == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Projects</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="events"
          {{ isset($header->events) && $header->events == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Events</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="news"
          {{ isset($header->news) && $header->news == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">News</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="about"
          {{ isset($header->about) && $header->about == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">About</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="advocacies"
          {{ isset($header->advocacies) && $header->advocacies == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Advocacies</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="contact"
          {{ isset($header->contact) && $header->contact == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Contact</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="gallery"
          {{ isset($header->gallery) && $header->gallery == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Gallery</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="blog"
          {{ isset($header->blog) && $header->blog == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Blog</label>
        </div>
        <div class="form-check form-switch mt-2">
          <input class="form-check-input" type="checkbox" name="downloads"
          {{ isset($header->downloads) && $header->downloads == 'on' ? 'checked' : "" }}>
          <label class="form-check-label">Downloads</label>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn btn-sm btn-primary" type="submit">Save</button>

      </div>
  </form>