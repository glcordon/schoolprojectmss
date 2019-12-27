import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
import stickyFooter from 'sticky-footer';

UIkit.use(Icons);
window.UIkit = UIkit;

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
                    planActives[j].className = 'plan uk-grid';
                }
                this.className = 'plan plan-active uk-grid';
            }

        });
    }
}

// Subscription Plan Cancel
var confirmCancelBtn = document.getElementById('confirm-cancel');
if(confirmCancelBtn){
    UIkit.util.on('#confirm-cancel', 'click', function (e) {
       e.preventDefault();
       e.target.blur();
       UIkit.modal.confirm(confirmCancelBtn.dataset.details, { labels: { ok: 'Yes, Cancel My Subscription', cancel: 'No Thanks' }, stack: true }).then(function () {
           window.location = confirmCancelBtn.dataset.url;
       }, function () {

       });
    });
}

/********** END PLANS FUNCTIONALIITY **********/

var hideBodyOverflow = function(){
    document.body.classList.add('hide-overflow');
}

var showBodyOverflow = function(){
    document.body.classList.remove('hide-overflow');
}

// Mobile Menu Click

if(document.getElementById('uk-nav-right-mobile')){
    document.getElementById('uk-nav-right-mobile').addEventListener('click', function(){
        document.getElementById('uk-nav-right').classList.toggle('mobile-visible');
        if( document.getElementById('uk-nav-right-mobile').classList.contains('open-menu') ){
            document.getElementById('uk-nav-right-mobile').classList.remove('open-menu');
            showBodyOverflow();
        } else {
            document.getElementById('uk-nav-right-mobile').classList.add('open-menu');
            hideBodyOverflow();
        }
    });
}

if(document.getElementById('uk-nav-left-mobile')){
    document.getElementById('uk-nav-left-mobile').addEventListener('click', function(){
        document.getElementById('uk-nav-left').classList.toggle('mobile-visible');
        if( document.getElementById('uk-nav-left-mobile').classList.contains('open-menu') ){
            document.getElementById('uk-nav-left-mobile').classList.remove('open-menu');
            showBodyOverflow();
        } else {
            document.getElementById('uk-nav-left-mobile').classList.add('open-menu');
            hideBodyOverflow();
        }
    });
}

var links = document.querySelectorAll('a[uk-scroll]');
for(var i; i < links.length; i++){
    links[i].addEventListener('click', function(){
        document.getElementById('uk-nav-right').classList.remove('mobile-visible');
        document.getElementById('uk-nav-right-mobile').classList.remove('open-menu');
        showBodyOverflow();
    });
}

var mobileOptimizations = function(){
    if(window.innerWidth < 959){
        document.getElementById('user-dropdown').classList.add('uk-open');
    }
}

mobileOptimizations();
window.onresize = function(event) {
    mobileOptimizations();
}