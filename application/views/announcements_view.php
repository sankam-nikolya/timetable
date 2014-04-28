<div class="container">
	<p id="title"></p>
	<p id="text"></p>
</div>

<script type="text/javascript">
    $(document).ready(function(event) {
    	$.getJSON('<?= base_url() ?>admin/announcements/edit_data_json/4', { get_param: 'value' }, function(data) {
    		$('#title').text(data[0]['title']);
    		$('#text').text(data[0]['text']);
		});
    });
</script>