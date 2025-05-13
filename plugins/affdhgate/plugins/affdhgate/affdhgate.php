// Function to fetch DHgate products from the CSV feed
function affdhgate_get_products() {
    $csv_url = 'http://download.dhgate.com/cps/google/dataFeed_HOT.csv';
    $csv = file_get_contents($csv_url);
    $lines = explode(PHP_EOL, $csv);
    $products = [];

    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
    $limit = 10;
    $end = $start + $limit;

    for ($i = 1; $i < count($lines); $i++) {
        if ($i < $start + 1) continue;
        if ($i > $end) break;

        $fields = str_getcsv($lines[$i]);
        if (count($fields) < 5) continue;

        $products[] = [
            'title' => $fields[0],
            'description' => $fields[1],
            'link' => $fields[3],
            'image' => $fields[5]
        ];
    }

    return $products;
}

// Plugin dashboard menu
function affdhgate_dashboard_menu() {
    add_menu_page('affDhgate', 'affDhgate', 'manage_options', 'affdhgate', 'affdhgate_dashboard_page');
}
add_action('admin_menu', 'affdhgate_dashboard_menu');

// Dashboard page content
function affdhgate_dashboard_page() {
    echo '<div class="wrap"><h2>affDhgate Products</h2>';
    $products = affdhgate_get_products();

    foreach ($products as $product) {
        echo '<div style="margin:20px 0;padding:10px;border:1px solid #ccc;">';
        echo '<h3>' . esc_html($product['title']) . '</h3>';
        echo '<img src="' . esc_url($product['image']) . '" style="max-width:150px;"><br>';
        echo '<p>' . esc_html($product['description']) . '</p>';
        echo '<a href="' . esc_url($product['link']) . '" target="_blank">View Product</a>';
        echo '</div>';
    }

    $next_start = isset($_GET['start']) ? intval($_GET['start']) + 10 : 10;
    echo '<a href="' . admin_url('admin.php?page=affdhgate&start=' . $next_start) . '" class="button button-primary">More</a>';
    echo '</div>';
}
