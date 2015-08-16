<?php
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class TT_Member_List_Table extends WP_List_Table {
    
    /** ************************************************************************
     * Normally we would be querying data from a database and manipulating that
     * for use in your list table. For this example, we're going to simplify it
     * slightly and create a pre-built array. Think of this as the data that might
     * be returned by $wpdb->query().
     * 
     * @var array 
     **************************************************************************/
    var $example_data = array(
            array(
                'ID'        => 1,
                'title'     => '300',
                'rating'    => 'R',
                'director'  => 'Zach Snyder'
            ),
            array(
                'ID'        => 2,
                'title'     => 'Eyes Wide Shut',
                'rating'    => 'R',
                'director'  => 'Stanley Kubrick'
            ),
            array(
                'ID'        => 3,
                'title'     => 'Moulin Rouge!',
                'rating'    => 'PG-13',
                'director'  => 'Baz Luhrman'
            ),
            array(
                'ID'        => 4,
                'title'     => 'Snow White',
                'rating'    => 'G',
                'director'  => 'Walt Disney'
            ),
            array(
                'ID'        => 5,
                'title'     => 'Super 8',
                'rating'    => 'PG-13',
                'director'  => 'JJ Abrams'
            ),
            array(
                'ID'        => 6,
                'title'     => 'The Fountain',
                'rating'    => 'PG-13',
                'director'  => 'Darren Aronofsky'
            ),
            array(
                'ID'        => 7,
                'title'     => 'Watchmen',
                'rating'    => 'R',
                'director'  => 'Zach Snyder'
            )
        );


    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'member',     //singular name of the listed records
            'plural'    => 'members',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );
        
    }
    function countryArray($name, $selected){
        $country_Array = array('AF' => 'Afghanistan', 'AL' => 'Albania', 'DZ' =>
        'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' =>
        'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' =>
        'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' =>
        'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' =>
        'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' =>
        'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' =>
        'Bolivia', 'BA' => 'Bosnia and Herzegowina', 'BW' => 'Botswana', 'BV' =>
        'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' =>
        'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' =>
        'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' =>
        'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' =>
        'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' =>
        'Congo', 'CD' => 'Congo, the Democratic Republic of the', 'CK' => 'Cook Islands',
        'CR' => 'Costa Rica', 'CI' => 'Cote d&#39Ivoire', 'HR' => 'Croatia (Hrvatska)',
        'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DK' => 'Denmark',
        'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'TP' =>
        'East Timor', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' =>
        'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji',
        'FI' => 'Finland', 'FR' => 'France', 'FX' => 'France, Metropolitan', 'GF' =>
        'French Guiana', 'PF' => 'French Polynesia', 'TF' =>
        'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' =>
        'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' =>
        'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' =>
        'Guam', 'GT' => 'Guatemala', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' =>
        'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard and Mc Donald Islands', 'VA' =>
        'Holy See (Vatican City State)', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' =>
        'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' =>
        'Iran (Islamic Republic of)', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IL' =>
        'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JO' => 'Jordan',
        'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KP' =>
        'Korea, Democratic People&#39s Republic of', 'KR' => 'Korea, Republic of', 'KW' =>
        'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Lao People&#39s Democratic Republic',
        'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' =>
        'Libyan Arab Jamahiriya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' =>
        'Luxembourg', 'MO' => 'Macau', 'MK' =>
        'Macedonia, The Former Yugoslav Republic of', 'MG' => 'Madagascar', 'MW' =>
        'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' =>
        'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania',
        'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' =>
        'Micronesia, Federated States of', 'MD' => 'Moldova, Republic of', 'MC' =>
        'Monaco', 'MN' => 'Mongolia', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' =>
        'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' =>
        'Nepal', 'NL' => 'Netherlands', 'AN' => 'Netherlands Antilles', 'NC' =>
        'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger',
        'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'MP' =>
        'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan',
        'PW' => 'Palau', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' =>
        'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' =>
        'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' =>
        'Reunion', 'RO' => 'Romania', 'RU' => 'Russian Federation', 'RW' => 'Rwanda',
        'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint LUCIA', 'VC' =>
        'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'ST' =>
        'Sao Tome and Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'SC' =>
        'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' =>
        'Slovakia (Slovak Republic)', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands',
        'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' =>
        'South Georgia and the South Sandwich Islands', 'ES' => 'Spain', 'LK' =>
        'Sri Lanka', 'SH' => 'St. Helena', 'PM' => 'St. Pierre and Miquelon', 'SD' =>
        'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard and Jan Mayen Islands', 'SZ' =>
        'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' =>
        'Syrian Arab Republic', 'TW' => 'Taiwan, Province of China', 'TJ' =>
        'Tajikistan', 'TZ' => 'Tanzania, United Republic of', 'TH' => 'Thailand', 'TG' =>
        'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' =>
        'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' =>
        'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' =>
        'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom', 'US' =>
        'United States', 'UM' => 'United States Minor Outlying Islands', 'UY' =>
        'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VE' => 'Venezuela', 'VN' =>
        'Viet Nam', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (U.S.)',
        'WF' => 'Wallis and Futuna Islands', 'EH' => 'Western Sahara', 'YE' => 'Yemen',
        'YU' => 'Yugoslavia', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe');
        foreach ($country_Array as $key => $value) {
            if ($selected == $key) {
                $thisExtra = stripslashes($value);
            } else {
                $thisExtra = "";
            }
        }
        return $thisExtra;
    }
    function column_default($item, $column_name){
        switch($column_name){
            case 'c_phone':
                if(empty($item['c_phone'])){
                    return '_';
                }
            case 'c_message':
                if(empty($item['c_phone'])){
                    return '_';
                }
            case 'c_username':
            case 'c_email':
                 return $item[ $column_name ];
               
            default:
                return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
        }
    }

    function column_c_username($item){
        
        //Build row actions
        $actions = array(
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id'])
        );
        //Return the title contents
        return sprintf('%1$s %2$s', $item['c_username'], $this->row_actions($actions) );
    }


    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id']                //The value of the checkbox should be the record's id
        );
    }


    /** ************************************************************************
     * REQUIRED! This method dictates the table's columns and titles. This should
     * return an array where the key is the column slug (and class) and the value 
     * is the column's title text. If you need a checkbox for bulk actions, refer
     * to the $columns array below.
     * 
     * The 'cb' column is treated differently than the rest. If including a checkbox
     * column in your table you must create a column_cb() method. If you don't need
     * bulk actions or checkboxes, simply leave the 'cb' entry out of your array.
     * 
     * @see WP_List_Table::::single_row_columns()
     * @return array An associative array containing column information: 'slugs'=>'Visible Titles'
     **************************************************************************/
    function get_columns(){
        
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'c_username' =>'Name',
            'c_email'     => 'Email',
            'c_phone'    => 'Phone',
            'c_message'    => 'Message'
        );
        
        return $columns;
    }


    /** ************************************************************************
     * Optional. If you want one or more columns to be sortable (ASC/DESC toggle), 
     * you will need to register it here. This should return an array where the 
     * key is the column that needs to be sortable, and the value is db column to 
     * sort by. Often, the key and value will be the same, but this is not always
     * the case (as the value is a column name from the database, not the list table).
     * 
     * This method merely defines which columns should be sortable and makes them
     * clickable - it does not handle the actual sorting. You still need to detect
     * the ORDERBY and ORDER querystring variables within prepare_items() and sort
     * your data accordingly (usually by modifying your query).
     * 
     * @return array An associative array containing all the columns that should be sortable: 'slugs'=>array('data_values',bool)
     **************************************************************************/
    function get_sortable_columns() {
        $sortable_columns = array(
            'c_username'  => array('c_username',false),
            'c_email' => array('c_email',false),
            'c_phone'   => array('c_phone',false),
            'c_message' => array('c_message',false)
        );
        return $sortable_columns;
    }


    /** ************************************************************************
     * Optional. If you need to include bulk actions in your list table, this is
     * the place to define them. Bulk actions are an associative array in the format
     * 'slug'=>'Visible Title'
     * 
     * If this method returns an empty value, no bulk action will be rendered. If
     * you specify any bulk actions, the bulk actions box will be rendered with
     * the table automatically on display().
     * 
     * Also note that list tables are not automatically wrapped in <form> elements,
     * so you will need to create those manually in order for bulk actions to function.
     * 
     * @return array An associative array containing all the bulk actions: 'slugs'=>'Visible Titles'
     **************************************************************************/
    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete'
        );
        return $actions;
    }


    /** ************************************************************************
     * Optional. You can handle your bulk actions anywhere or anyhow you prefer.
     * For this example package, we will handle it in the class to keep things
     * clean and organized.
     * 
     * @see $this->prepare_items()
     **************************************************************************/
    
    function process_bulk_action() {
        
        //Detect when a bulk action is being triggered...
       /* if( 'delete'===$this->current_action() ) {
            global $wpdb;
            echo '<script>alert('.$_GET['id'].')</script>';
            $wpdb->delete('wp_members', array('id' => $_GET['id']));
            $link = admin_url().'admin.php?page=tt_member';*/
            //echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
            //wp_die('Items deleted (or they would be if we had items to delete)!');
        
        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                global $wpdb;
                $wpdb->delete('wp_user_request', array('id' => $_GET['id']));
                $link = admin_url().'admin.php?page=link_user_request';
            }
        }
         
    }
    

    //edit member
    
    function prepare_items() {
        global $wpdb; //This is used only if making any database queries
        //$_SERVER['REQUEST_URI'] = remove_query_arg( '_wp_http_referer', $_SERVER['REQUEST_URI'] );
        /**
         * First, lets decide how many records per page to show
         */
        $per_page = 10;
         
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
        print_r($actions);
        $this->process_bulk_action();
        //edit compare
        //$data = $this->example_data;
          global $wpdb;
          
          
          $search = $_POST['s'];
          //echo "<script>alert('$search')</script>";
          if( $search != NULL ){
                
                // Trim Search Term
                $search = trim($search);
               
                /* Notice how you can search multiple columns for your search term easily, and return one data set */
                $s_query = "SELECT id, c_username, c_email, c_phone, c_message FROM wp_user_request where c_username LIKE '%$search%'
                    OR c_email LIKE '%$search%'
                    OR c_phone LIKE '%$search%'
                    OR c_message LIKE '%$search%'
                ";
                $members = $wpdb->get_results($s_query);
                $data = array();
                foreach ($members as $querydatum ) {
                    array_push($data, (array)$querydatum);}
         
          }else{
            $query = 'SELECT id, c_username, c_email, c_phone, c_message FROM wp_user_request';
            
            $members = $wpdb->get_results($query);
            $data = array();
            foreach ($members as $querydatum ) {
                    array_push($data, (array)$querydatum);
            }
          }
          
        
        function usort_reorder($a,$b){
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'title'; //If no sort, default to title
            $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc'; //If no order, default to asc
            $result = strcmp($a[$orderby], $b[$orderby]); //Determine sort order
            return ($order==='asc') ? $result : -$result; //Send final sort direction to usort
        }
        usort($data, 'usort_reorder');
        
        $current_page = $this->get_pagenum();
        

        $total_items = count($data);
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }


}





/** ************************ REGISTER THE TEST PAGE ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */
function tt_user_reuest_menu_items(){
    add_menu_page('User Request', 'User Request', 'activate_plugins', 'link_user_request', 'tt_render_user_request_list_page','',8);
} add_action('admin_menu', 'tt_user_reuest_menu_items');


/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************
 * This function renders the admin page and the example list table. Although it's
 * possible to call prepare_items() and display() from the constructor, there
 * are often times where you may need to include logic here between those steps,
 * so we've instead called those methods explicitly. It keeps things flexible, and
 * it's the way the list tables are used in the WordPress core.
 */
function tt_render_user_request_list_page(){
    
    //Create an instance of our package class...
    $testListTable = new TT_Member_List_Table();
    //Fetch, prepare, sort, and filter our data...
    $search = $_POST['s'];
    if( isset($search) ){
            $testListTable->prepare_items($search);
    } else {
            $testListTable->prepare_items();
    }
    //$testListTable->prepare_items();
    ?>
    <div class="wrap">
        <input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
        <form method="post">
          <input type="hidden" name="page" value="link_user_request" />
          <?php $testListTable->search_box('search', 'search_id'); ?>
        </form>
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
        <form id="movies-filter" method="get">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <!-- Now we can render the completed list table -->
            <?php $testListTable->display() ?>
        </form>
        
    </div>
    <?php
}