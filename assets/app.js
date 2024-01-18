/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import $ from 'jquery';

var $container = $('.js-vote-arrows');
$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);
    $.ajax({
        url: '/comments/10/vote/'+$link.data('direction'),
        method: 'POST'
    }).then(function(data) {
        $container.find('.js-vote-total').text(data.votes);
    });
});

/*
.find(a).on('click') - finds any link within the container with the class .js-vote-arrows and triggers a function on the onClick event handler

onclick sends .ajax request to 'comments/../ up | down' -> on success jquery passes json data from endpoint

is linked to show-component via script in javascript block "called" through:
<script src="{{ asset('js/question_show.js') }}"></script>

since we only want to add script and not overwrite another {{parent()}} needs to be added on top of script
*/

