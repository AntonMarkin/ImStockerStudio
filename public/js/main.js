function siteInit(){
    initDownloading();
    initTutorialMenu();
}

function reachGoal(goal){
    try{
        ym(21447229,'reachGoal',goal)
    }
    catch(err){
        console.log(err);
    }
}

function initDownloading(){
    var downloading_win = document.querySelector('.index-appBlock-download.type-win');
    var downloading_mac = document.querySelector('.index-appBlock-download.type-mac');
    if (!downloading_win || !downloading_mac) return;

    function switchDownload(mac){
        if (mac){
            downloading_win.style.display = 'none';
            downloading_mac.style.display = 'block';
        }
        else {
            downloading_win.style.display = 'block';
            downloading_mac.style.display = 'none';
        }
    }

    var switch_mac = downloading_win ? downloading_win.querySelector('.index-appBlock-download-selector-not-active') : null;
    if (switch_mac) switch_mac.onclick = function(){ switchDownload(true); };

    var switch_win = downloading_mac ? downloading_mac.querySelector('.index-appBlock-download-selector-not-active') : null;
    if (switch_win) switch_win.onclick = function(){ switchDownload(false); };

    const mac = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);
    switchDownload(mac);

}

function sidebarToggle(){
    if (nodeHasClass(document.body)) nodeRemoveClass(document.body, "state-openSidebar");
    else nodeAddClass(document.body, "state-openSidebar");
}

function sidebarClose(){
    nodeRemoveClass(document.body, "state-openSidebar");
}

function nodeHasClass(node, class_name){
    if (!node) return false;

    if (node.classList !== undefined){
        if (node.classList.contains(class_name)) return true;
    }
    else if (node.className === undefined) return false;
    else if (node.className === class_name) return true;
    else {
        // check all classes
        const classes = node.className.split(/\s/);
        if (classes.some(c => c.trim() === class_name)){
            return true;
        }
    }
    return false;
}

function nodeAddClass(node, class_name){
    if (!node || !class_name) return;

    if (node.classList !== undefined){
        node.classList.add(class_name);
    }
    else if (!nodeHasClass(node, class_name)){
        const classes = node.className.split(/\s/);
        classes.push(class_name);
        node.className = classes.join(" ");
    }
}

function nodeRemoveClass(node, class_name){
    if (!node) return;

    if (node.classList !== undefined){
        node.classList.remove(class_name);
    }
    else if (nodeHasClass(node, class_name)){
        const classes = node.className.split(/\s/);
        const ind = classes.indexOf(class_name);
        if (ind >= 0) classes.splice(ind, 1);
        node.className = classes.join(" ");
    }
}

function initTutorialMenu(){
    const tutorial_page = document.querySelector('.tutorialPage');
    if (!tutorial_page) return;

    let scroll_anim_start_y = null;
    let scroll_anim_start_time = null;
    let scroll_anim_end_y = null;
    const ANIM_TIME = 600;

    function scroll_to_header(hash){
        if (!hash || hash[0] !== '#') return;

        try{
            const target_header = tutorial_page.querySelector(hash);
            if (!target_header) return;

            const target_rect = target_header.getBoundingClientRect();
            scroll_anim_start_y = window.scrollY;
            scroll_anim_end_y = Math.round(window.scrollY + target_rect.y - 60);
            scroll_anim_start_time = Date.now();

            window.requestAnimationFrame(scroll_step);
        }
        catch (err){
            console.error('scroll_to_header', err);
        }
    }

    function scroll_step(){
        const dy = scroll_anim_end_y - scroll_anim_start_y;
        const dt = Date.now() - scroll_anim_start_time;

        if (dt >= ANIM_TIME) {
            window.scrollTo(0, scroll_anim_end_y);
            return;
        }

        window.scrollTo(0, Math.round(scroll_anim_start_y + dy * dt / ANIM_TIME));

        window.requestAnimationFrame(scroll_step);
    }

    const tutorial_menu = tutorial_page.querySelector('.tutorialPage-menu');
    tutorial_menu.addEventListener('click', function(event){
        if (nodeHasClass(event.target, 'tutorialPage-menu-link')){
            const hash = event.target.href.match(/#(.*?)$/)
            if (!hash) return;
            scroll_to_header('#' + hash[1]);
            event.preventDefault();
        }
    })
}
