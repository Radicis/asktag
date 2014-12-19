function s3_upload(){
    var status_elem = document.getElementById("status");
    var url_elem = document.getElementById("avatar_url");
    var preview_elem = document.getElementById("preview");
    var s3upload = new S3Upload({
        file_dom_selector: 'file',
        s3_sign_put_url: '/sign_s3/',

        onProgress: function(percent, message) {
            status_elem.innerHTML = 'Upload progress: ' + percent + '% ' + message;
        },
        onFinishS3Put: function(url) {
            status_elem.innerHTML = 'Upload completed. Uploaded to: '+ url;
            url_elem.value = url;
            preview_elem.innerHTML = '<img src="'+url+'" style="width:150px;" />';
        },
        onError: function(status) {
            status_elem.innerHTML = 'Upload error: ' + status;
        }
    });
}