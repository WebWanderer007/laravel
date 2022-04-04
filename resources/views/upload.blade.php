<h1>Upload File</h1>

<form action="/upload-file" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id=""><br><br>
    <input type="submit" value="Upload">
</form>