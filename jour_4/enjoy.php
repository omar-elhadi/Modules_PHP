<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hobby']) && is_array($_POST['hobby'])) {
        $hobbies = $_POST['hobby'];
        $validated_hobbies = [];

        foreach ($hobbies as $hobby) {
            $validated_hobbies[] = checkHobby(trim($hobby));
        }

		if(count($validated_hobbies) < 2){
			echo "Choisissez au moins 2 loisirs";
			exit();
		}
        echo "vos loisirs sont : " . implode(', ', $validated_hobbies);
    }
}

function checkHobby($hobby) {
    if (!empty($hobby)) {
        $result = match ($hobby) {
            'music' => 'Musique',
            'gastronomie' => 'Gastronomie',
            'sport' => 'Sport',
            'lecture' => 'Lecture',
            'manga' => 'Manga',
            'litterature' => 'Litterature',
            'code' => 'Code',
            default => '',
        };
        return $result;
    }
    return '';
}

?>
