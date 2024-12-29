<?php
$plugin_dir = __DIR__ . '/wp-content/plugins/';
$old_plugin = $plugin_dir . 'old-plugin-folder-name';
$new_plugin = __DIR__ . '/path-to-updated-plugin-folder';


function delete_dir($dir)
{
    if (!is_dir($dir)) {
        return false;
    }
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        is_dir($path) ? delete_dir($path) : unlink($path);
    }
    return rmdir($dir);
}


function copy_dir($source, $destination)
{
    @mkdir($destination, 0755, true);
    $files = array_diff(scandir($source), ['.', '..']);
    foreach ($files as $file) {
        $src = $source . DIRECTORY_SEPARATOR . $file;
        $dest = $destination . DIRECTORY_SEPARATOR . $file;
        is_dir($src) ? copy_dir($src, $dest) : copy($src, $dest);
    }
    return true;
}


if (delete_dir($old_plugin)) {
    echo "Old plugin removed successfully.<br>";
} else {
    echo "Failed to remove the old plugin. Make sure the path is correct and permissions are set.<br>";
}


if (copy_dir($new_plugin, $old_plugin)) {
    echo "New plugin version installed successfully.<br>";
} else {
    echo "Failed to install the new plugin version.<br>";
}


require_once(__DIR__ . '/wp-load.php');
$plugin_main_file = 'old-plugin-folder-name/main-plugin-file.php';
activate_plugin($plugin_main_file);
echo "Plugin activated successfully.";
