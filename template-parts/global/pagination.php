<?php

$attr = [
    'show_all'           => false,
    'end_size'           => 1,
    'mid_size'           => 2,
    'prev_next'          => true,
    'prev_text'          => '<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.86877 0.505938C9.95013 0.587202 10.0147 0.683706 10.0587 0.789929C10.1027 0.896153 10.1254 1.01001 10.1254 1.125C10.1254 1.23999 10.1027 1.35385 10.0587 1.46007C10.0147 1.5663 9.95013 1.6628 9.86877 1.74406L3.48674 8.125L20.6247 8.125C20.8568 8.125 21.0793 8.21719 21.2434 8.38128C21.4075 8.54538 21.4997 8.76794 21.4997 9C21.4997 9.23207 21.4075 9.45462 21.2434 9.61872C21.0793 9.78281 20.8568 9.875 20.6247 9.875L3.48674 9.875L9.86878 16.2559C10.033 16.4201 10.1252 16.6428 10.1252 16.875C10.1252 17.1072 10.033 17.3299 9.86878 17.4941C9.70459 17.6582 9.48191 17.7505 9.24971 17.7505C9.01752 17.7505 8.79484 17.6582 8.63065 17.4941L0.755649 9.61906C0.674294 9.5378 0.609755 9.4413 0.565722 9.33507C0.521688 9.22885 0.499023 9.11499 0.499023 9C0.499023 8.88501 0.521688 8.77115 0.565722 8.66493C0.609755 8.55871 0.674294 8.4622 0.755649 8.38094L8.63065 0.505938C8.71191 0.424583 8.80842 0.360044 8.91464 0.31601C9.02086 0.271976 9.13472 0.249313 9.24971 0.249313C9.3647 0.249313 9.47856 0.271976 9.58478 0.31601C9.69101 0.360044 9.78751 0.424583 9.86877 0.505938Z" fill="#25282B"/></svg>',
    'next_text'          => '<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.1312 17.4941C12.0499 17.4128 11.9853 17.3163 11.9413 17.2101C11.8973 17.1038 11.8746 16.99 11.8746 16.875C11.8746 16.76 11.8973 16.6462 11.9413 16.5399C11.9853 16.4337 12.0499 16.3372 12.1312 16.2559L18.5133 9.875L1.37529 9.875C1.14322 9.875 0.920662 9.78281 0.756568 9.61872C0.592474 9.45462 0.500288 9.23206 0.500288 9C0.500288 8.76793 0.592474 8.54537 0.756569 8.38128C0.920662 8.21719 1.14322 8.125 1.37529 8.125L18.5133 8.125L12.1312 1.74406C11.967 1.57987 11.8748 1.35719 11.8748 1.125C11.8748 0.892804 11.967 0.670121 12.1312 0.505935C12.2954 0.34175 12.5181 0.249511 12.7503 0.249511C12.9825 0.249511 13.2052 0.34175 13.3694 0.505935L21.2444 8.38094C21.3257 8.4622 21.3902 8.5587 21.4343 8.66493C21.4783 8.77115 21.501 8.88501 21.501 9C21.501 9.11499 21.4783 9.22885 21.4343 9.33507C21.3902 9.4413 21.3257 9.5378 21.2444 9.61906L13.3693 17.4941C13.2881 17.5754 13.1916 17.64 13.0854 17.684C12.9791 17.728 12.8653 17.7507 12.7503 17.7507C12.6353 17.7507 12.5214 17.728 12.4152 17.684C12.309 17.64 12.2125 17.5754 12.1312 17.4941Z" fill="#25282B"/></svg>',
    'type'               => 'plain',
    'add_args'           => false,
    'before_page_number' => '',
    'after_page_number'  => ''
];

if (!empty($args['current'])) {
    $attr['current'] = $args['current'];
}

if (!empty($args['current'])) {
    $attr['total'] = $args['total'];
}

$pagination_output = paginate_links($attr);

if ($pagination_output != '') { ?>
    <div class="pagination-container">
        <nav class="pagination" aria-label="Page navigation">
            <?php echo $pagination_output; ?>
        </nav>
    </div>
<?php }