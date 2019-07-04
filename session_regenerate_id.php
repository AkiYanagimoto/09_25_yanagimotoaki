<?php

session_start();
$old_session_id = session_id();
session_regenerate_id(true);
$new_session_id = session_id();
echo '<p>旧ID' . $old_session_id . '</p>';
echo '<p>新ID' . $new_session_id . '</p>';
