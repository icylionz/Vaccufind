function forms() {
    document.getElementById('search').style.display = 'none';
    document.getElementById('byID').style.display = 'none';
    document.getElementById('byName').style.display = 'none';
    document.getElementById('patient').style.display = 'none';
    document.getElementById('wait').style.display = 'none';
    document.getElementById('notification').style.display = 'none';
    document.getElementById('essential').style.display = 'none';
    document.getElementById('medical').style.display = 'none';
    document.getElementById('vac').style.display = 'none';
    document.getElementById('vaccineList').style.display = 'none';
    document.getElementById('settings').style.display = 'none';
    document.getElementById('create').style.display = 'none';
    document.getElementById('createSuper').style.display = 'none';
}

function searchList() {
    if (document.getElementById('search').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'block';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('search').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function patientList() {
    if (document.getElementById('patient').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'block';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('patient').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function waitList() {
    if (document.getElementById('wait').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'block';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('wait').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';

    }
}

function notificationTable() {
    if (document.getElementById('notification').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'block';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('notification').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function essentialForm() {
    if (document.getElementById('essential').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'block';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('essential').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function medicalForm() {
    if (document.getElementById('medical').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'block';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('medical').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function vacForm() {
    if (document.getElementById('vac').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'block';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('vac').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function vaccineList() {
    if (document.getElementById('vaccineList').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'block';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('vaccineList').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function settingsPanel() {
    if (document.getElementById('settings').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'block';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('settings').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function createForm() {
    if (document.getElementById('create').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'block';
        document.getElementById('createSuper').style.display = 'none';
    } else if (document.getElementById('create').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}

function createSuperForm() {
    if (document.getElementById('createSuper').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('createSuper').style.display = 'block';
    } else if (document.getElementById('createSuper').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
        document.getElementById('vaccineList').style.display = 'none';
        document.getElementById('settings').style.display = 'none';
        document.getElementById('create').style.display = 'none';
        document.getElementById('createSuper').style.display = 'none';
    }
}