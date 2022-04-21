<?php

// HTML Helpers
function hPaginateDescription($pagination): string
{
    $currentPerpage = $pagination->currentPage() * $pagination->perPage();
    $html = '';
    $html .= 'Displaying ';
    $html .= '<b>' . ($currentPerpage - ($pagination->perPage() - 1)) . '</b>';
    $html .= ' through ';
    $html .= '<b>' . (($currentPerpage) > $pagination->total() ? $pagination->total() : ($currentPerpage)) . '</b>';
    $html .= ' of ';
    $html .= '<b>' . $pagination->total() . '</b>';
    $html .= ' record' . ($pagination->total() > 1 ? 's' : '') . '.';
    return $html;
}

function callDeleteModal(
    string $route,
    string $message = 'Do you want to delete this contact?'
): string {
    return '<a href="' . $route . '" class="btn btn-outline-danger rounded-pill px-3 ml-2 float-right ml-1 j_modal_delete"
    data-header="Delete" data-content="' . $message . '"
    data-btn-confirm-label="Delete" data-method="delete">
    <i class="fas fa-trash mr-2"></i> Delete
    </a>';
}
