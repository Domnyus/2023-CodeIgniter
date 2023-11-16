<!DOCTYPE html>

<hmtl>
	<head><title>Card</title></head>
	<body>
	<div>
		<?= $h1 ?>
	</div>
	<div>
		<?= form_open("card/create") ?>
			<?= form_input(array("type" => "text", "required" => "required", "minlenght" => "2", "name" => "username")) ?>
		<?= form_submit(array(""), "enviar") ?>
		<?= form_close() ?>
	</div>
	<div>
		<?php foreach ($cards as $row): ?>
			<?= form_open("card/update") ?>
			<?= form_input(array("hidden" => "hidden", "type" => "text", "required" => "required", "minlenght" => "2", "name" => "id", "value" => $row->id)) ?>
			<?= form_input(array("type" => "text", "required" => "required", "minlenght" => "2", "name" => "username", "value" => $row->username)) ?>
			<?= form_submit(array(""), "atualizar") ?>
			<?= form_close() ?>
			<div><button onclick="deleted(<?= $row->id ?>)">Excluir</button></div>
		<?php endforeach; ?>
	</div>
	<script>
		const updated = (event) =>
		{
			const id = event.target.dataset.id;
			const newUsername = document.getElementById(`username_${id}`)
			console.log({method: "POST", body: {username: newUsername.value}})
			fetch(`${location.href}index.php/card/update/${id}`, {method: "POST", body: {username: newUsername.value}}).then(response => response.json()).then(data => console.log(data));
			//location.reload();
		}
		const deleted = (id) =>
		{
			fetch(`${location.href}index.php/card/delete/${id}`).then(response => console.log(response));
			console.log(`${location.href}index.php/card/delete/${id}`);
			location.reload();
		}
	</script>
	</body>
</hmtl>
