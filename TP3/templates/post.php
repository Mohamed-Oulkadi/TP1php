<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les commentaires</title>
</head>
<body>
<h2>Les commentaires</h2>
    
    <?php foreach($comments as $comment){ ?>

    <p><strong><?= htmlspecialchars($comment['firstname']);?></strong></p>
    <em>le <?php echo $comment['french_visite_date']; ?></em>
    <em><?php echo $comment['comment']; ?></em>
    
    <?php } ?>
</body>
</html>