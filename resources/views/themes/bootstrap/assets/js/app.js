import bootstrap from 'bootstrap';
import * as $ from 'jquery';
import stickyFooter from 'sticky-footer';
import toastr from 'toastr';

window.toastr = toastr;

var url = document.querySelector("meta[name='url']").getAttribute("content");
var csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content");

window.onload = function() {
    stickyFooter.init();
};

/********** NOTIFICATION FUNCTIONALITY **********/

var iconMore = document.getElementsByClassName("icon-more");

for (var i = 0; i < iconMore.length; i++) {
    iconMore[i].addEventListener('click', function(){
        if(this.nextElementSibling.style.display == "block"){
            this.nextElementSibling.style.display = "none";
        } else {
            this.nextElementSibling.style.display = "block";
        }

    });
}

var markAsRead = document.getElementsByClassName("mark-as-read");
var removedNotifications = 0;
var unreadNotifications =  markAsRead.length;
for (var i = 0; i < markAsRead.length; i++) {
    markAsRead[i].addEventListener('click', function(){
        var notificationId = this.dataset.id;
        var notificationListId = this.dataset.listid;

        var notificationRequest = new XMLHttpRequest();
        notificationRequest.open("POST", url + "/notification/read/" + notificationId, true);
        notificationRequest.onreadystatechange = function () {
            if (notificationRequest.readyState != 4 || notificationRequest.status != 200) return;
            var response = JSON.parse(notificationRequest.responseText);
            document.getElementById('notification-li-' + response.listid).remove();
            removedNotifications += 1;
            var notificationCount = document.getElementById('notification-count');
            if(notificationCount){
                notificationCount.innerHTML = parseInt(notificationCount.innerHTML) - 1;
            }
            if(removedNotifications >= unreadNotifications){
                if(document.getElementById('notifications-none')){
                    document.getElementById('notifications-none').className = "";
                }
                if(document.getElementById('notification-count')){
                    document.getElementById('notification-count').className = "fadeOut";
                }
            }
        };
        notificationRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        notificationRequest.send("_token=" + csrf + "&listid=" + notificationListId );
    });
}

/********** END NOTIFICATION FUNCTIONALITY **********/

/********** API SETTINGS FUNCTIONALITY **********/

var viewApiKeyModal = document.getElementById('viewApiKey');
if(viewApiKeyModal){
    var viewKeys = document.getElementsByClassName('viewapikey');
    for (var i = 0; i < viewKeys.length; i++) {
        viewKeys[i].addEventListener('click', function(){
            document.getElementById('viewKeyName').innerHTML = this.dataset.name;
            document.getElementById('viewKeyValue').value = this.dataset.key;
        });
    }
}

var editApiKey = document.getElementById('editApiKey');
if(editApiKey){
    var editKeys = document.getElementsByClassName('editapikey');
    for (var i = 0; i < editKeys.length; i++) {
        editKeys[i].addEventListener('click', function(){
            document.getElementById('editKeyName').innerHTML = this.dataset.name;
            document.getElementById('editKeyInput').value = this.dataset.name;
            document.getElementById('editKeyForm').action = this.dataset.action;
        });
    }
}

var deleteApiKey = document.getElementById('deleteApiKey');
if(deleteApiKey){
    var deleteKeys = document.getElementsByClassName('deleteapikey');
    for (var i = 0; i < deleteKeys.length; i++) {
        deleteKeys[i].addEventListener('click', function(){
            document.getElementById('deleteKeyName').innerHTML = this.dataset.name;
            document.getElementById('deleteKeyForm').action = this.dataset.action;
        });
    }
}

/********** END API SETTINGS FUNCTIONALITY **********/

/********** PLANS FUNCTIONALITY **********/

var plansEl = document.getElementById('plans');

if(plansEl){
    var plans = document.getElementsByClassName('plan');
    for (var i = 0; i < plans.length; i++) {
        plans[i].addEventListener('click', function(){
            var update_plan_form = document.getElementById('update-plan-form');

            document.getElementById('planInput').value = this.dataset.plan;

            if(update_plan_form){
                update_plan_form.submit();
            } else {
                var planActives = document.querySelectorAll('.plan.plan-active');
                for (var j = 0; j < planActives.length; j++){
                    planActives[j].className = 'plan row';
                }
                this.className = 'plan plan-active row';
            }

        });
    }
}

// Subscription Plan Cancel
var confirmCancelBtn = document.getElementById('confirm-cancel');
if(confirmCancelBtn){
    // UIkit.util.on('#confirm-cancel', 'click', function (e) {
    //    e.preventDefault();
    //    e.target.blur();
    //    UIkit.modal.confirm(confirmCancelBtn.dataset.details, { labels: { ok: 'Yes, Cancel My Subscription', cancel: 'No Thanks' }, stack: true }).then(function () {
    //        window.location = confirmCancelBtn.dataset.url;
    //    }, function () {

    //    });
    // });
}

/********** END PLANS FUNCTIONALIITY **********/


$(function() {

    // Prevent bootstrap menu items click functionality
    $('.dropdown a').on('click', function(event){
        // The event won't be propagated up to the document NODE and
        // therefore delegated events won't be fired
        event.stopPropagation();
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() > 0 && $('body').hasClass('home')) {
            $('#navbar').addClass('fixedToTop');
        } else {
            $('#navbar').removeClass('fixedToTop');
        }
    });

    $('[data-toggle="popover"]').popover();


    if( document.getElementById('upload-crop') ){
        document.getElementById('upload').addEventListener('change', function () {
            $('#imgModal').modal('show');
            readFile(this);
        });

        $('#imgModal').on('hidden.bs.modal', function (e) {
            document.getElementById('upload').value = '';
        });

        $('#apply-crop').click(function(e){
            uploadCrop.result({type:'base64',size:'original',format:'png',quality:1}).then(function(base64) {
                $('#imgModal').modal('hide');
                document.getElementById('preview').src = base64;
                document.getElementById('uploadBase64').value = base64;
            });
        });
    }

});