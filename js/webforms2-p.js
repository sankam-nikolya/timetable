/*
 * Web Forms 2.0 Cross-browser Implementation <http://code.google.com/p/webforms2/>
 * Version: 0.5.4 (2008-07-29)
 * Copyright: 2007, Weston Ruter <http://weston.ruter.net/>
 * License: GNU General Public License, Free Software Foundation
 *          <http://creativecommons.org/licenses/GPL/2.0/>
 * 
 * The comments contained in this code are largely quotations from the 
 * WebForms 2.0 specification: <http://whatwg.org/specs/web-forms/current-work/>
 *
 * Usage: <script type="text/javascript" src="webforms2-p.js"></script>
 */

if (!window.$wf2) {
    var $wf2 = {};
    if (document.implementation && document.implementation.hasFeature && !document.implementation.hasFeature('WebForms', '2.0')) {
        $wf2 = {version: '0.5.4', _5c: false, _6f: '', _7b: (window.HTMLElement && HTMLElement.prototype), _7c: ($wf2.__defineGetter__ && $wf2.__defineSetter__), onDOMContentLoaded: function () {
            if ($wf2._5c)return;
            $wf2._5c = true;
            var i, j, k, node;
            var style = document.createElement('link');
            style.setAttribute('type', 'text/css');
            style.setAttribute('rel', 'stylesheet');
            style.setAttribute('href', $wf2._6f + 'webforms2.css');
            var _2 = document.getElementsByTagName('head')[0];
            if (!_2)_2 = document.getElementsByTagName('*')[0];
            _2.insertBefore(style, _2.firstChild);
            $wf2._43 = {};
            $wf2._43.datetime = $wf2._56("1970-01-01T00:00:00.0Z");
            $wf2._43['datetime-local'] = $wf2._56("1970-01-01T00:00:00.0");
            $wf2._43.date = $wf2._43.datetime;
            $wf2._43.month = $wf2._43.datetime;
            $wf2._43.week = $wf2._56("1970-W01");
            $wf2._43.time = $wf2._43.datetime;
            $wf2._0 = null;
            if (window.XMLHttpRequest)$wf2._0 = new XMLHttpRequest(); else if (window.ActiveXObject) {
                try {
                    $wf2._0 = new ActiveXObject("Msxml2.XMLHTTP")
                } catch (e) {
                    try {
                        $wf2._0 = new ActiveXObject("Microsoft.XMLHTTP")
                    } catch (e) {
                    }
                }
            }
            if ($wf2._0) {
                $wf2._79();
                $wf2._7a()
            }
            $wf2.initRepetitionBlocks();
            $wf2.initRepetitionTemplates();
            $wf2.initRepetitionButtons('add');
            $wf2.initRepetitionButtons('remove');
            $wf2.initRepetitionButtons('move-up');
            $wf2.initRepetitionButtons('move-down');
            $wf2._72();
            $wf2._73();
            if (document.addEventListener) {
                document.addEventListener('mousedown', $wf2._49, false);
                document.addEventListener('keydown', $wf2._49, false)
            } else if (document.attachEvent) {
                document.attachEvent('onmousedown', $wf2._49);
                document.attachEvent('onkeydown', $wf2._49)
            }
            $wf2.initNonRepetitionFunctionality()
        }, _79: function () {
            var select, selects = $wf2._50.apply(document.documentElement, ['select', 'datalist']);
            for (var i = 0; select = selects[i]; i++) {
                var _23 = $wf2._62(select);
                if (_23 && _23.documentElement && /:?\bselect$/i.test(_23.documentElement.nodeName) && _23.documentElement.namespaceURI == 'http://www.w3.org/1999/xhtml') {
                    var root = _23.documentElement;
                    if (root.getAttribute('type') != 'incremental') {
                        while (select.lastChild)select.removeChild(select.lastChild)
                    }
                    node = root.firstChild;
                    while (node) {
                        select.appendChild($wf2._7d(node));
                        node = node.nextSibling
                    }
                }
            }
        }, _7a: function () {
            var frm, frms = document.getElementsByTagName('form');
            for (var i = 0; frm = frms[i]; i++) {
                var _23 = $wf2._62(frm);
                if (_23 && _23.documentElement && /:?\bformdata$/.test(_23.documentElement.nodeName) && _23.documentElement.namespaceURI == 'http://n.whatwg.org/formdata') {
                    var rt;
                    var root = _23.documentElement;
                    if (root.getAttribute('type') != 'incremental')frm.reset();
                    var clr, clrs = root.getElementsByTagName('clear');
                    for (j = 0; clr = clrs[j]; j++) {
                        if (clr.namespaceURI == 'http://n.whatwg.org/formdata' && clr.parentNode == root && !clr.firstChild && (rt = document.getElementById(clr.getAttribute('template'))) && rt.getAttribute('repeat') == 'template') {
                            var _4, node, next;
                            node = rt.parentNode.firstChild;
                            while (node) {
                                if (node.nodeType == 1 && (_4 = node.getAttributeNode('repeat')) && _4.value != 'template') {
                                    next = node.nextSibling;
                                    node.parentNode.removeChild(node);
                                    node = next
                                } else node = node.nextSibling
                            }
                        }
                    }
                    var index, rpt, rpts = root.getElementsByTagName('repeat');
                    for (j = 0; rpt = rpts[j]; j++) {
                        if (rpt.namespaceURI == 'http://n.whatwg.org/formdata' && rpt.parentNode == root && !rpt.firstChild && (rt = document.getElementById(rpt.getAttribute('template'))) && rt.getAttribute('repeat') == 'template' && /^-?\d+$/.test(index = rpt.getAttribute('index'))) {
                            var _3c, _4, node, next;
                            node = rt.parentNode.firstChild;
                            while (node) {
                                if (node.nodeType == 1 && (_4 = node.getAttributeNode('repeat')) && _4.value == index) {
                                    _3c = true;
                                    break
                                }
                                node = node.nextSibling
                            }
                            if (!_3c) {
                                $wf2._80.apply(rt, [null, index])
                            }
                        }
                    }
                    var fld, flds = root.getElementsByTagName('field');
                    var _17 = $wf2._4f.apply(frm);
                    for (j = 0; fld = flds[j]; j++) {
                        var _1b = fld.getAttributeNode('index');
                        var name = fld.getAttribute('name');
                        if (!name || (_1b && !/^\d+$/.test(_1b.value)))continue;
                        var value = '';
                        for (k = 0; node = fld.childNodes[k]; k++) {
                            if (node.nodeType == 3 || node.nodeType == 4)value += node.data; else break
                        }
                        var ctrl, _33 = 0;
                        for (k = 0; ctrl = _17[k]; k++) {
                            if (ctrl.type == 'image') {
                                if (ctrl.name ? (ctrl.name + '.x' == name || ctrl.name + '.y' == name) : (name == 'x' || name == 'y')) {
                                    if (!_1b || ++_33 - 1 >= _1b.value)break
                                }
                            } else if (ctrl.name == name) {
                                if (_1b) {
                                    if (++_33 - 1 < _1b.value)continue
                                } else if ((ctrl.type == 'radio' || ctrl.type == 'checkbox') && (value && ctrl.value != value))continue;
                                break
                            }
                        }
                        if (ctrl.type == 'file' || ctrl.type == 'button' || ctrl.type == 'image')continue;
                        if (!ctrl.getAttributeNode('multiple') || !ctrl.wf2Prefilled) {
                            if (ctrl.type == 'checkbox' || ctrl.type == 'radio') {
                                if (!value)ctrl.checked = false; else if (ctrl.value == value)ctrl.checked = true; else break
                            } else if (ctrl.nodeName.toLowerCase() == 'select') {
                                ctrl.selectedIndex = -1;
                                for (var opt, k = 0; opt = ctrl.options[k]; k++) {
                                    if (opt.value ? opt.value == value : opt.text == value) {
                                        opt.selected = true;
                                        break
                                    }
                                }
                            } else {
                                ctrl.value = value;
                                $wf2._6a(ctrl);
                                if (!ctrl.validity.valid) {
                                    ctrl.value = ctrl.defaultValue;
                                    $wf2._6a(ctrl)
                                }
                            }
                            ctrl.wf2Prefilled = true
                        } else if (ctrl.getAttributeNode('multiple')) {
                            for (var opt, k = 0; opt = ctrl.options[k]; k++) {
                                if (!opt.selected && (opt.value ? opt.value == value : opt.text == value)) {
                                    opt.selected = true;
                                    break
                                }
                            }
                        }
                    }
                    var _17 = $wf2._4f.apply(frm);
                    for (j = 0; j < _17.length; j++) {
                    }
                }
            }
        }, _13: [], _68: function () {
            if (this.wf2Initialized)return;
            this.wf2Initialized = true;
            this.style.display = 'none';
            this.repetitionType = 1;
            if (!this.repetitionIndex)this.repetitionIndex = 0;
            this.repetitionTemplate = null;
            if (!this.repetitionBlocks)this.repetitionBlocks = [];
            var _attr;
            this.repeatStart = /^\d+$/.test(_attr = this.getAttribute('repeat-start')) ? parseInt(_attr) : 1;
            this.repeatMin = /^\d+$/.test(_attr = this.getAttribute('repeat-min')) ? parseInt(_attr) : 0;
            this.repeatMax = /^\d+$/.test(_attr = this.getAttribute('repeat-max')) ? parseInt(_attr) : Number.MAX_VALUE;
            if (!this.addRepetitionBlock)this.addRepetitionBlock = function (_c, index) {
                return $wf2._7f.apply(this, [_c, index])
            };
            if (!this.addRepetitionBlockByIndex)this.addRepetitionBlockByIndex = this.addRepetitionBlock;
            var frm = this;
            while (frm = frm.parentNode) {
                if (frm.nodeName.toLowerCase() == 'form')break
            }
            var _templateElements;
            if (frm && (_templateElements = $wf2._50.apply(this, ['button', 'input', 'select', 'textarea', 'isindex'])).length) {
                for (var el, i = 0; el = _templateElements[i]; i++)el.disabled = true
            }
            var _4, _f = this.parentNode.firstChild;
            while (_f && _f != this) {
                if (_f.nodeType == 1 && (_4 = _f.getAttributeNode('repeat')) && /^-?\d+$/.test(_4.value) && !_f.getAttribute('repeat-template')) {
                    _f.repetitionTemplate = this;
                    _f.setAttribute('repeat-template', this.id);
                    this.repetitionBlocks.push(_f)
                }
                _f = _f.nextSibling
            }
            for (var i = 0; (i < this.repeatStart || this.repetitionBlocks.length < this.repeatMin); i++)this.addRepetitionBlock();
            $wf2._13.push(this);
            this.wf2Initialized = true
        }, initRepetitionTemplates: function (parentNode) {
            var _13 = $wf2._51.apply((parentNode || document.documentElement), [
                ['*'],
                'repeat',
                'template'
            ]);
            for (var i = 0, rt; i < _13.length; i++)$wf2._68.apply(_13[i])
        }, _65: function () {
            if (this.wf2Initialized)return;
            this.style.display = '';
            this.repetitionType = 2;
            var _attr;
            this.repetitionIndex = /^\d+$/.test(_attr = this.getAttribute('repeat')) ? parseInt(_attr) : 0;
            this.repetitionBlocks = null;
            this.repetitionTemplate = null;
            var node;
            if ((node = document.getElementById(this.getAttribute('repeat-template'))) && node.getAttribute('repeat') == 'template') {
                this.repetitionTemplate = node
            } else {
                node = this;
                while (node = node.nextSibling) {
                    if (node.nodeType == 1 && node.getAttribute('repeat') == 'template') {
                        this.repetitionTemplate = node;
                        break
                    }
                }
            }
            if (!this.removeRepetitionBlock)this.removeRepetitionBlock = function () {
                return $wf2._81.apply(this)
            };
            if (!this.moveRepetitionBlock)this.moveRepetitionBlock = function (_5) {
                return $wf2._82.apply(this, [_5])
            };
            this.wf2Initialized = true
        }, initRepetitionBlocks: function (parentNode) {
            var repetitionBlocks = $wf2._51.apply((parentNode || document.documentElement), [
                ['*'],
                'repeat',
                'template',
                true
            ]);
            for (var i = 0; i < repetitionBlocks.length; i++)$wf2._65.apply(repetitionBlocks[i])
        }, repetitionButtonDefaultLabels: {'add': 'Add', 'remove': 'Remove', 'move-up': 'Move-up', 'move-down': 'Move-down'}, _67: function (_7) {
            if (this.wf2Initialized)return;
            this.htmlTemplate = $wf2._4e(this);
            if (!this.firstChild)this.appendChild(document.createTextNode($wf2.repetitionButtonDefaultLabels[_7]));
            if (_7 != 'add')this.disabled = !$wf2._4d(this); else {
                var rb;
                this.disabled = !(((rb = $wf2._4d(this)) && rb.repetitionTemplate) || this.htmlTemplate)
            }
            if (this.addEventListener)this.addEventListener('click', $wf2._66, false); else if (this.attachEvent)this.attachEvent('onclick', $wf2._66); else this.onclick = $wf2._66;
            this.wf2Initialized = true
        }, initRepetitionButtons: function (_7, _2) {
            var i;
            if (!_2)_2 = document.documentElement;
            var inpts = $wf2._51.apply(_2, [
                ['input'],
                'type',
                _7
            ]);
            for (i = 0; i < inpts.length; i++) {
                var btn = document.createElement('button');
                for (var j = 0, _4; _4 = inpts[i].attributes[j]; j++)btn.setAttribute(_4.nodeName, inpts[i].getAttribute(_4.nodeName));
                inpts[i].parentNode.replaceChild(btn, inpts[i]);
                btn = null
            }
            var _40 = $wf2._51.apply(_2, [
                ['button'],
                'type',
                _7
            ]);
            for (var i = 0; i < _40.length; i++)$wf2._67.apply(_40[i], [_7])
        }, _66: function (e) {
            if (e && e.preventDefault)e.preventDefault();
            var btn;
            if (e && e.target)btn = e.target; else if (window.event)btn = event.srcElement; else if (this.nodeName.toLowerCase() == 'button')btn = this;
            var _7 = String(btn.getAttribute('type')).toLowerCase();
            if (btn.onclick) {
                btn._onclick = btn.onclick;
                btn.removeAttribute('onclick');
                btn.onclick = null
            }
            if (btn.returnValue !== undefined && !btn.returnValue) {
                btn.returnValue = undefined;
                return false
            }
            if (btn._onclick && btn.returnValue === undefined) {
                btn.returnValue = btn._onclick(e);
                if (btn.returnValue !== undefined && !btn.returnValue) {
                    btn.returnValue = undefined;
                    return false
                }
            }
            btn.returnValue = undefined;
            var block;
            if (_7 != 'add') {
                block = $wf2._4d(btn);
                this.disabled = !block;
                if (block) {
                    if (_7.indexOf('move') === 0) {
                        block._clickedMoveBtn = btn;
                        block.moveRepetitionBlock(_7 == 'move-up' ? -1 : 1)
                    } else if (_7 == 'remove') {
                        block.removeRepetitionBlock()
                    }
                }
            } else {
                var rt;
                if (btn.htmlTemplate)rt = btn.htmlTemplate; else {
                    block = $wf2._4d(btn);
                    if (block && block.repetitionTemplate)rt = block.repetitionTemplate
                }
                if (rt)rt.addRepetitionBlock(); else btn.disabled = true
            }
            return false
        }, _7f: function (_c, index) {
            if (this.getAttribute('repeat') != 'template')throw $wf2._70(9);
            if (!this.repetitionBlocks)this.repetitionBlocks = [];
            if (!this.repetitionIndex)this.repetitionIndex = 0;
            if (!this.repeatMin)this.repeatMin = 0;
            if (!this.repeatMax)this.repeatMax = Number.MAX_VALUE;
            if (!this.repeatStart)this.repeatStart = 1;
            if (this.parentNode == null)return null;
            var node = this;
            while (node = node.parentNode) {
                if (node.nodeType == 1 && node.getAttribute('repeat') == 'template')return false
            }
            var _f = this.previousSibling;
            var _32 = 0;
            while (_f != null) {
                if (_f.nodeType == 1) {
                    var repeatAttr, _2a;
                    repeat = parseInt(_f.getAttribute('repeat'));
                    _2a = _f.getAttributeNode('repeat-template');
                    if (!isNaN(repeat) && (!_2a || _2a.value == this.id)) {
                        this.repetitionIndex = Math.max(this.repetitionIndex, repeat + 1);
                        _32++
                    }
                }
                _f = _f.previousSibling
            }
            if (this.repeatMax <= _32)return null;
            if (index !== undefined && index > this.repetitionIndex)this.repetitionIndex = index;
            var _22 = this.getAttribute('id') ? 'id' : this.getAttribute('name') ? 'name' : '';
            var _16 = this.getAttribute(_22);
            var block;
            var replaceValue = this.repetitionIndex;
            var _1d, _1;
            if (_16 && !/\u005B|\u02D1|\u005D|\u00B7/.test(_16)) {
                _1d = new RegExp("(\\[|\u02D1)" + _16 + "(\\]|\u00B7)", 'g');
                _1 = function (_1c) {
                    if (!_1c)return _1c;
                    _1c = _1c.toString();
                    if (_1c.indexOf("\uFEFF") === 0)return _1c.replace(/^\uFEFF/, '');
                    return _1c.replace(_1d, replaceValue)
                }
            }
            block = $wf2._7d(this, _1);
            block.wf2Initialized = false;
            _1d = null;
            block.setAttribute('repeat', this.repetitionIndex);
            block.removeAttribute('repeat-min');
            block.removeAttribute('repeat-max');
            block.removeAttribute('repeat-start');
            if (_22) {
                block.setAttribute('repeat-template', _16);
                block.removeAttribute(_22)
            }
            if (!_c) {
                _c = this;
                while (_c.previousSibling && _c.previousSibling.repetitionType != 2)_c = _c.previousSibling;
                this.parentNode.insertBefore(block, _c);
                this.repetitionBlocks.push(block)
            } else {
                _c.parentNode.insertBefore(block, _c.nextSibling);
                this.repetitionBlocks.push(block);
                if ($wf2._69)this.repetitionBlocks.sort($wf2._69)
            }
            this.repetitionIndex++;
            $wf2._65.apply(block);
            $wf2.initRepetitionTemplates(block);
            $wf2.initRepetitionButtons('add', block);
            $wf2.initRepetitionButtons('remove', block);
            $wf2.initRepetitionButtons('move-up', block);
            $wf2.initRepetitionButtons('move-down', block);
            if ($wf2._5c) {
                $wf2._72(this);
                $wf2._73(this.parentNode)
            }
            $wf2.initNonRepetitionFunctionality(block);
            var _9;
            try {
                if (document.createEvent)_9 = document.createEvent('UIEvents'); else if (document.createEventObject)_9 = document.createEventObject();
                RepetitionEvent._upgradeEvent.apply(_9);
                _9.initRepetitionEvent('added', true, false, block);
                if (this.dispatchEvent)this.dispatchEvent(_9); else if (this.fireEvent) {
                }
            } catch (err) {
                _9 = new Object();
                RepetitionEvent._upgradeEvent.apply(_9);
                _9.initRepetitionEvent('added', true, false, block)
            }
            var _2d;
            if ((_2d = this.getAttribute('onadded')) && (!this.onadded || typeof this.onadded != 'function')) {
                this.onadded = new Function('event', _2d)
            } else if ((_2d = this.getAttribute('onadd')) && (!this.onadd || typeof this.onadd != 'function')) {
                this.onadd = new Function('event', _2d)
            }
            try {
                if (this.onadded) {
                    this.onadded.apply(this, [_9])
                } else if (this.onadd) {
                    this.onadd.apply(this, [_9])
                }
            } catch (err) {
                setTimeout(function () {
                    throw err
                }, 0)
            }
            return block
        }, _80: function (_c, index) {
            $wf2._7f.apply(this, [_c, index])
        }, _81: function () {
            if (this.repetitionType != 2)throw $wf2._70(9);
            var parentNode = this.parentNode;
            var block = parentNode.removeChild(this);
            $wf2._73(parentNode);
            if (this.repetitionTemplate != null) {
                for (var i = 0; i < this.repetitionTemplate.repetitionBlocks.length; i++) {
                    if (this.repetitionTemplate.repetitionBlocks[i] == this) {
                        this.repetitionTemplate.repetitionBlocks.splice(i, 1);
                        break
                    }
                }
            }
            if (this.repetitionTemplate != null) {
                var _d;
                try {
                    if (document.createEvent)_d = document.createEvent('UIEvents'); else if (document.createEventObject)_d = document.createEventObject();
                    RepetitionEvent._upgradeEvent.apply(_d);
                    _d.initRepetitionEvent('removed', true, false, this);
                    if (this.repetitionTemplate.dispatchEvent)this.repetitionTemplate.dispatchEvent(_d); else if (this.repetitionTemplate.fireEvent) {
                    }
                } catch (err) {
                    _d = new Object();
                    RepetitionEvent._upgradeEvent.apply(_d);
                    _d.initRepetitionEvent('removed', true, false, this)
                }
                var _2d;
                if ((_2d = this.repetitionTemplate.getAttribute('onremoved')) && (!this.repetitionTemplate.onremoved || typeof this.repetitionTemplate.onremoved != 'function')) {
                    this.repetitionTemplate.onremoved = new Function('event', _2d)
                } else if ((_2d = this.repetitionTemplate.getAttribute('onremove')) && (!this.repetitionTemplate.onremove || typeof this.repetitionTemplate.onremove != 'function')) {
                    this.repetitionTemplate.onremove = new Function('event', _2d)
                }
                try {
                    if (this.repetitionTemplate.onremoved) {
                        this.repetitionTemplate.onremoved.apply(this, [_d])
                    } else if (this.repetitionTemplate.onremove) {
                        this.repetitionTemplate.onremove.apply(this, [_d])
                    }
                } catch (err) {
                    setTimeout(function () {
                        throw err
                    }, 0)
                }
            }
            if (this.repetitionTemplate != null) {
                if (this.repetitionTemplate.repetitionBlocks.length < this.repetitionTemplate.repeatMin && this.repetitionTemplate.repetitionBlocks.length < this.repetitionTemplate.repeatMax) {
                    this.repetitionTemplate.addRepetitionBlock()
                }
                if (this.repetitionTemplate.repetitionBlocks.length < this.repetitionTemplate.repeatMax) {
                    var _3d = $wf2._51.apply(document.documentElement, [
                        ['button'],
                        'type',
                        'add'
                    ]);
                    for (i = 0; i < _3d.length; i++) {
                        if (_3d[i].htmlTemplate == this.repetitionTemplate)_3d[i].disabled = false
                    }
                }
            }
        }, _82: function (_5) {
            if (this.repetitionType != 2)throw $wf2._70(9);
            if (_5 == 0 || this.parentNode == null)return;
            var target = this;
            if (this.repetitionTemplate) {
                var pos = 0;
                var rp = this.repetitionTemplate.repetitionBlocks;
                while (pos < rp.length && rp[pos] != this)pos++;
                rp.splice(pos, 1);
                rp.splice(_5 < 0 ? Math.max(pos + _5, 0) : Math.min(pos + _5, rp.length), 0, this)
            }
            if (_5 < 0) {
                while (_5 != 0 && target.previousSibling && target.previousSibling.repetitionType != 1) {
                    target = target.previousSibling;
                    if (target.repetitionType == 2)_5++
                }
            } else {
                while (_5 != 0 && target.nextSibling && target.nextSibling.repetitionType != 1) {
                    target = target.nextSibling;
                    if (target.repetitionType == 2)_5--
                }
                target = target.nextSibling
            }
            this.parentNode.insertBefore(this, target);
            if (this._clickedMoveBtn) {
                this._clickedMoveBtn.focus();
                this._clickedMoveBtn = null
            }
            $wf2._73(this.parentNode);
            if (this.repetitionTemplate != null) {
                var _a;
                try {
                    if (document.createEvent)_a = document.createEvent('UIEvents'); else if (document.createEventObject)_a = document.createEventObject();
                    RepetitionEvent._upgradeEvent.apply(_a);
                    _a.initRepetitionEvent('moved', true, false, this);
                    if (this.repetitionTemplate.dispatchEvent)this.repetitionTemplate.dispatchEvent(_a); else if (this.repetitionTemplate.fireEvent) {
                    }
                } catch (err) {
                    _a = new Object();
                    RepetitionEvent._upgradeEvent.apply(_a);
                    _a.initRepetitionEvent('moved', true, false, this)
                }
                var _2d;
                if ((_2d = this.repetitionTemplate.getAttribute('onmoved')) && (!this.repetitionTemplate.onmoved || typeof this.repetitionTemplate.onmoved != 'function')) {
                    this.repetitionTemplate.onmoved = new Function('event', _2d)
                } else if (_2d = this.repetitionTemplate.getAttribute('onmove')) {
                    if (!this.repetitionTemplate.onmove || typeof this.repetitionTemplate.onmove != 'function') {
                        this.repetitionTemplate.onmove = new Function('event', _2d)
                    }
                    var _26;
                    if (typeof _2d == 'function' && (_26 = _2d.toString().match(/^\s*function\s+anonymous\(\s*\)\s*\{((?:.|\n)+)\}\s*$/))) {
                        this.repetitionTemplate.onmove = new Function('event', _26[1])
                    }
                }
                try {
                    if (this.repetitionTemplate.onmoved) {
                        this.repetitionTemplate.onmoved.apply(this, [_a])
                    } else if (this.repetitionTemplate.onmove) {
                        this.repetitionTemplate.onmove.apply(this, [_a])
                    }
                } catch (err) {
                    setTimeout(function () {
                        throw err
                    }, 0)
                }
            }
        }, _4d: function (node) {
            while (node = node.parentNode) {
                if (node.repetitionType == 2) {
                    return node
                }
            }
            return null
        }, _4e: function (button) {
            var _4 = button.getAttribute('template');
            var node;
            if (_4 && (node = document.getElementById(_4)) && node.getAttribute('repeat') == 'template')return node;
            return null
        }, _72: function (rt) {
            var _13 = rt ? [rt] : $wf2._13;
            var _40 = $wf2._51.apply(document.documentElement, [
                ['button'],
                'type',
                'add'
            ]);
            for (var i = 0; i < _40.length; i++) {
                for (var t, j = 0; t = _13[j]; j++) {
                    if (_40[i].htmlTemplate == t && t.repetitionBlocks.length >= t.repeatMax) {
                        _40[i].disabled = true
                    }
                }
            }
        }, _73: function (_2) {
            var i;
            var rbs = [];
            if (!_2) {
                var _75 = [];
                rbs = $wf2._51.apply(document.documentElement, [
                    ['*'],
                    'repeat',
                    'template',
                    true
                ]);
                for (i = 0; block = rbs[i]; i++) {
                    if (!$wf2._52(_75, block.parentNode)) {
                        $wf2._73(block.parentNode);
                        _75.push(block.parentNode)
                    }
                }
                return
            }
            var j, btn, block;
            var child = _2.firstChild;
            while (child) {
                if (child.repetitionType == 2)rbs.push(child);
                child = child.nextSibling
            }
            for (i = 0; block = rbs[i]; i++) {
                var moveUpBtns = $wf2._51.apply(block, [
                    ['button'],
                    'type',
                    'move-up'
                ]);
                for (j = 0; btn = moveUpBtns[j]; j++) {
                    btn.disabled = !(rb = $wf2._4d(btn)) || (i == 0)
                }
                var moveDownBtns = $wf2._51.apply(block, [
                    ['button'],
                    'type',
                    'move-down'
                ]);
                for (j = 0; btn = moveDownBtns[j]; j++) {
                    btn.disabled = !(rb = $wf2._4d(btn)) || (i == rbs.length - 1)
                }
            }
        }, initNonRepetitionFunctionality: function (_2) {
            _2 = (_2 || document.documentElement);
            var i, j, frm, frms = _2.getElementsByTagName('form');
            for (i = 0; frm = frms[i]; i++) {
                if (frm.checkValidity)continue;
                frm.checkValidity = $wf2._60;
                if (frm.addEventListener)frm.addEventListener('submit', $wf2._64, false); else frm.attachEvent('onsubmit', $wf2._64)
            }
            var ctrl, ctrls = $wf2._50.apply(_2, ['input', 'select', 'textarea']);
            for (i = 0; ctrl = ctrls[i]; i++) {
                $wf2._5d(ctrl);
                $wf2._6a(ctrl)
            }
            var els = $wf2._51.apply(document.documentElement, [
                ['*'],
                'autofocus'
            ]);
            if (_2.getAttribute('autofocus'))els.unshift(_2);
            for (i = 0; i < els.length; i++)$wf2._5b(els[i]);
            var textareas = $wf2._51.apply(_2, [
                ['textarea'],
                'maxlength'
            ]);
            if (_2.nodeName.toLowerCase() == 'textarea')textareas.unshift(_2);
            for (i = 0; i < textareas.length; i++)textareas[i].maxLength = parseInt(textareas[i].getAttribute('maxlength'))
        }, _5b: function (el) {
            if (el.autofocus === false || el.autofocus === true)return;
            el.autofocus = true;
            if (el.disabled)return;
            var node = el;
            while (node && node.nodeType == 1) {
                if ($wf2._53(node, 'visibility') == 'hidden' || $wf2._53(node, 'display') == 'none')return;
                node = node.parentNode
            }
            el.focus()
        }, _60: function () {
            var i, el, valid = true;
            var _17 = $wf2._4f.apply(this);
            for (i = 0; el = _17[i]; i++) {
                var type = (el.getAttribute('type') ? el.getAttribute('type').toLowerCase() : el.type);
                el.willValidate = !(/(hidden|button|reset|add|remove|move-up|move-down)/.test(type) || !el.name || el.disabled);
                if (el.checkValidity && el.willValidate) {
                    if (!el.checkValidity())valid = false
                }
            }
            if (!valid && $wf2._44.length) {
                $wf2._44[0].errorMsg.className += " wf2_firstErrorMsg";
                el = $wf2._44[0].target;
                if (el.style.display == 'none' || !el.offsetParent) {
                    while (el && (el.nodeType != 1 || (el.style.display == 'none' || !el.offsetParent)))el = el.previousSibling;
                    var cur = el;
                    var top = 0;
                    if (cur && cur.offsetParent) {
                        top = cur.offsetTop;
                        while (cur = cur.offsetParent)top += cur.offsetTop
                    }
                    scrollTo(0, top)
                } else {
                    el.focus();
                    scrollBy(0, $wf2._44[0].errorMsg.offsetHeight)
                }
            }
            return valid
        }, _5e: function () {
            $wf2._6a(this);
            if (this.validity.valid)return true;
            var canceled = false;
            var _6;
            try {
                if (document.createEvent)_6 = document.createEvent('Events'); else if (document.createEventObject)_6 = document.createEventObject();
                _6.initEvent('invalid', true, true);
                _6.srcElement = this;
                if (this.dispatchEvent)canceled = !this.dispatchEvent(_6); else if (this.fireEvent) {
                }
            } catch (err) {
                _6 = new Object();
                if (_6.initEvent)_6.initEvent('invalid', true, true); else {
                    _6.type = 'invalid';
                    _6.cancelBubble = false
                }
                _6.target = _6.srcElement = this
            }
            var _3a = this.getAttribute('oninvalid');
            if (_3a && (!this.oninvalid || typeof this.oninvalid != 'function'))this.oninvalid = new Function('event', _3a);
            try {
                if (this.oninvalid) {
                    canceled = this.oninvalid.apply(this, [_6]) === false || canceled
                }
            } catch (err) {
                setTimeout(function () {
                    throw err
                }, 0)
            }
            var _78 = false;
            if (this.type == 'radio' || this.type == 'checkbox') {
                for (var i = 0; i < $wf2._44.length; i++) {
                    if (this.form[this.name][0] == $wf2._44[i].target) {
                        _78 = true;
                        break
                    }
                }
            }
            if (!canceled && !_78)$wf2._47(this);
            return false
        }, _63: /^-?\d+(.\d+)?(e-?\d+)?$/, _6b: /^(\w+):(\/\/)?.+$/i, _6d: /^\S+@\S+$/i, _6a: function (node) {
            var _10, _11, _29;
            _10 = node.getAttributeNode('min');
            _11 = node.getAttributeNode('max');
            node.min = undefined;
            node.max = undefined;
            node.step = undefined;
            _29 = node.getAttributeNode('value');
            node.validity = $wf2._61();
            node.validity.customError = !!node.validationMessage;
            var type = (node.getAttribute('type') ? node.getAttribute('type').toLowerCase() : node.type);
            var _15 = (type == 'datetime' || type == 'datetime-local' || type == 'time');
            var _2e = (type == 'date' || type == 'month' || type == 'week');
            var _31 = (type == 'number' || type == 'range');
            var _36 = (type == 'file');
            var _20 = (_15 || _2e || _31);
            var _2b = _20 || node.nodeName.toLowerCase() == 'textarea';
            var _41 = (_20 || _36);
            var _34 = (type == 'radio' || type == 'checkbox');
            var _42 = (_2b || _36 || type == 'email' || type == 'url' || type == 'text' || type == 'password' || _34);
            if (type == 'range') {
                node.min = (_10 && $wf2._63.test(_10.value)) ? Number(_10.value) : 0;
                if ((!_29 || !_29.specified) && node.value === '' && !node.wf2ValueProvided) {
                    node.setAttribute('value', node.min);
                    node.value = node.min;
                    node.wf2ValueProvided = true
                }
            }
            node.wf2Value = node.value;
            var type = (node.getAttribute('type') ? node.getAttribute('type').toLowerCase() : node.type);
            node.willValidate = !(/(hidden|button|reset|add|remove|move-up|move-down)/.test(type) || !node.name || node.disabled);
            if (_42 && node.willValidate) {
                if (_34) {
                    if (node.form && node.form[node.name]) {
                        var _2c = false;
                        var _27 = false;
                        for (var i = 0; i < node.form[node.name].length; i++) {
                            if (node.form[node.name][i].getAttributeNode('required'))_2c = true;
                            if (node.form[node.name][i].checked)_27 = true
                        }
                        node.validity.valueMissing = (_2c && !_27)
                    }
                } else if (node.getAttributeNode('required')) {
                    node.validity.valueMissing = (node.value == '')
                }
            }
            if (!node.validity.valueMissing && node.value) {
                var _77 = node.getAttributeNode('pattern');
                if (_77) {
                    var _76 = new RegExp("^(?:" + _77.value + ")$");
                    _76.global = false;
                    _76.ignoreCase = false;
                    _76.multiline = false;
                    if (_76)node.validity.patternMismatch = !_76.test(node.value)
                }
                if (_2e || _15)node.validity.typeMismatch = ((node.wf2Value = $wf2._56(node.value, type)) == null); else {
                    switch (type) {
                        case'number':
                        case'range':
                            node.validity.typeMismatch = !$wf2._63.test(node.value);
                            break;
                        case'email':
                            node.validity.typeMismatch = !$wf2._6d.test(node.value);
                            break;
                        case'url':
                            node.validity.typeMismatch = !$wf2._6b.test(node.value);
                            break
                    }
                }
                if (!node.validity.patternMismatch && !node.validity.typeMismatch) {
                    if (_41) {
                        if (_31) {
                            if (type == 'range') {
                                node.max = (_11 && $wf2._63.test(_11.value)) ? Number(_11.value) : 100
                            } else {
                                if (_10 && $wf2._63.test(_10.value))node.min = Number(_10.value);
                                if (_11 && $wf2._63.test(_11.value))node.max = Number(_11.value)
                            }
                            node.validity.rangeUnderflow = (node.min != undefined && Number(node.value) < node.min);
                            node.validity.rangeOverflow = (node.max != undefined && Number(node.value) > node.max)
                        } else if (type == 'file') {
                            if (_10 && /^\d+$/.test(_10.value))node.min = Number(_10.value); else node.min = 0;
                            if (_11 && /^\d+$/.test(_11.value))node.max = Number(_11.value); else node.max = 1
                        } else {
                            if (_10) {
                                node.min = $wf2._56(_10.value, type);
                                node.validity.rangeUnderflow = (node.min && node.wf2Value < node.min)
                            }
                            if (_11) {
                                node.max = $wf2._56(_11.value, type);
                                node.validity.rangeOverflow = (node.max && node.wf2Value > node.max)
                            }
                        }
                    }
                    if (_20 && !node.validity.rangeUnderflow && !node.validity.rangeOverflow) {
                        var stepAttrNode = node.getAttributeNode('step');
                        if (!stepAttrNode) {
                            node.step = _15 ? 60 : 1
                        } else if (stepAttrNode.value == 'any')node.step = 'any'; else if ($wf2._63.test(stepAttrNode.value) && stepAttrNode.value > 0)node.step = Number(stepAttrNode.value); else node.step = _15 ? 60 : 1;
                        if (node.step != 'any') {
                            node.wf2StepDatum = null;
                            if (_10)node.wf2StepDatum = node.min; else if (_11)node.wf2StepDatum = node.max; else node.wf2StepDatum = $wf2._43[type] ? $wf2._43[type] : 0;
                            var _step = node.step;
                            if (type == 'month') {
                                var month1 = node.wf2StepDatum.getUTCFullYear() * 12 + node.wf2StepDatum.getUTCMonth();
                                var month2 = node.wf2Value.getUTCFullYear() * 12 + node.wf2Value.getUTCMonth();
                                node.validity.stepMismatch = (month2 - month1) % _step != 0
                            } else {
                                switch (type) {
                                    case'datetime':
                                    case'datetime-local':
                                    case'time':
                                        _step = parseInt(_step * 1000);
                                        break;
                                    case'date':
                                        _step = parseInt(_step * 24 * 60 * 60 * 1000);
                                        break;
                                    case'week':
                                        _step = parseInt(_step * 7 * 24 * 60 * 60 * 1000);
                                        break
                                }
                                node.validity.stepMismatch = (Math.round((node.wf2Value - node.wf2StepDatum) * 1000) % Math.round(_step * 1000)) != 0
                            }
                        }
                    }
                }
                if (_2b && node.maxLength >= 0 && node.value != node.defaultValue) {
                    var shortNewlines = 0;
                    var v = node.value;
                    node.wf2ValueLength = v.length;
                    for (var i = 1; i < v.length; i++) {
                        if (v[i] === "\x0A" && v[i - 1] !== "\x0D" || v[i] == "\x0D" && (v[i + 1] && v[i + 1] !== "\x0A"))node.wf2ValueLength++
                    }
                    node.validity.tooLong = node.wf2ValueLength > node.maxLength
                }
            }
            node.validity.valid = !$wf2._6e(node.validity)
        }, _5d: function (node) {
            if (node.validity && node.validity.typeMismatch !== undefined)return node;
            node.validationMessage = "";
            node.validity = $wf2._61();
            node.willValidate = true;
            var nodeName = node.nodeName.toLowerCase();
            if (nodeName == 'button' || nodeName == 'fieldset') {
                node.setCustomValidity = function (error) {
                    throw $wf2._70(9)
                };
                node.checkValidity = function () {
                    return true
                };
                return node
            }
            node.setCustomValidity = $wf2._5f;
            node.checkValidity = $wf2._5e;
            var type = (node.getAttribute('type') ? node.getAttribute('type').toLowerCase() : node.type);
            if (/(hidden|button|reset|add|remove|move-up|move-down)/.test(type) || !node.name || node.disabled)node.willValidate = false; else if (window.RepetitionElement) {
                var _2 = node;
                while (_2 = _2.parentNode) {
                    if (_2.repetitionType == 1) {
                        node.willValidate = false;
                        break
                    }
                }
            }
            return node
        }, _64: function (event) {
            var frm = event.currentTarget || event.srcElement;
            if (!frm.checkValidity()) {
                if (event.preventDefault)event.preventDefault();
                event.returnValue = false;
                return false
            }
            event.returnValue = true;
            return true
        }, _5f: function (error) {
            if (error) {
                this.validationMessage = String(error);
                this.validity.customError = true
            } else {
                this.validationMessage = "";
                this.validity.customError = false
            }
            this.validity.valid = !$wf2._6e(this.validity)
        }, _6e: function (validity) {
            return validity.typeMismatch || validity.rangeUnderflow || validity.rangeOverflow || validity.stepMismatch || validity.tooLong || validity.patternMismatch || validity.valueMissing || validity.customError
        }, _61: function () {
            return{typeMismatch: false, rangeUnderflow: false, rangeOverflow: false, stepMismatch: false, tooLong: false, patternMismatch: false, valueMissing: false, customError: false, valid: true}
        }, _44: [], _45: null, _46: null, stepUnits: {'datetime': 'second', 'datetime-local': 'second', 'time': 'second', 'date': 'day', 'week': 'week', 'month': 'month'}, invalidMessages: {valueMissing: 'A value must be supplied or selected.', typeMismatch: 'The value is invalid for %s type.', rangeUnderflow: 'The value must be equal to or greater than %s.', rangeOverflow: 'The value must be equal to or less than %s.', stepMismatch: 'The value has a step mismatch; it must be a certain number multiples of %s from %s.', tooLong: 'The value is too long. The field may have a maximum of %s characters but you supplied %s. Note that each line-break counts as two characters.', patternMismatch: 'The value does not match the required pattern: %s'}, _6c: function (value, type) {
            switch (String(type).toLowerCase()) {
                case'datetime':
                case'datetime-local':
                case'date':
                case'month':
                case'week':
                case'time':
                    return $wf2._59(value, type);
                default:
                    return value
            }
        }, _47: function (target) {
            var msg = document.createElement('div');
            msg.className = 'wf2_errorMsg';
            msg.id = (target.id || target.name) + '_wf2_errorMsg';
            msg.onmousedown = function () {
                this.parentNode.removeChild(this)
            };
            var type = (target.getAttribute('type') ? target.getAttribute('type').toLowerCase() : target.type);
            var isDateTimeRelated = (type == 'datetime' || type == 'datetime-local' || type == 'time' || type == 'date' || type == 'month' || type == 'week');
            var ol = document.createElement('ol');
            if (target.validity.valueMissing)ol.appendChild($wf2._48($wf2.invalidMessages.valueMissing));
            if (target.validity.typeMismatch)ol.appendChild($wf2._48($wf2.invalidMessages.typeMismatch.replace(/%s/, type)));
            if (target.validity.rangeUnderflow)ol.appendChild($wf2._48($wf2.invalidMessages.rangeUnderflow.replace(/%s/, $wf2._6c(target.min, type))));
            if (target.validity.rangeOverflow)ol.appendChild($wf2._48($wf2.invalidMessages.rangeOverflow.replace(/%s/, $wf2._6c(target.max, type))));
            if (target.validity.stepMismatch)ol.appendChild($wf2._48($wf2.invalidMessages.stepMismatch.replace(/%s/, target.step + ($wf2.stepUnits[type] ? ' ' + $wf2.stepUnits[type] + '(s)' : '')).replace(/%s/, $wf2._6c(target.wf2StepDatum, type))));
            if (target.validity.tooLong)ol.appendChild($wf2._48($wf2.invalidMessages.tooLong.replace(/%s/, target.maxLength).replace(/%s/, target.wf2ValueLength ? target.wf2ValueLength : target.value.length)));
            if (target.validity.patternMismatch)ol.appendChild($wf2._48($wf2.invalidMessages.patternMismatch.replace(/%s/, target.title ? target.title : ' "' + target.getAttribute('pattern') + '"')));
            if (target.validity.customError)ol.appendChild($wf2._48(target.validationMessage));
            if (ol.childNodes.length == 1)ol.className = 'single';
            msg.appendChild(ol);
            var _2 = document.body ? document.body : document.documentElement;
            if ($wf2._44.length)_2.insertBefore(msg, $wf2._44[$wf2._44.length - 1].errorMsg); else _2.insertBefore(msg, null);
            var el = target;
            while (el && (el.nodeType != 1 || (el.style.display == 'none' || el.style.visibility == 'hidden' || !el.offsetParent)))el = el.parentNode;
            var top = left = 0;
            var cur = el;
            if (cur && cur.offsetParent) {
                left = cur.offsetLeft;
                top = cur.offsetTop;
                while (cur = cur.offsetParent) {
                    left += cur.offsetLeft;
                    top += cur.offsetTop
                }
                top += el.offsetHeight
            }
            msg.style.top = top + 'px';
            msg.style.left = left + 'px';
            $wf2._44.push({target: target, errorMsg: msg});
            if (!target.className.match(/\bwf2_invalid\b/))target.className += " wf2_invalid";
            if ($wf2._46 == null) {
                $wf2._46 = setInterval(function () {
                    var _1f;
                    for (var i = 0; _1f = $wf2._44[i]; i++) {
                        if (!_1f.target.className.match(/\bwf2_invalid\b/)) {
                            _1f.target.className += " wf2_invalid"
                        } else {
                            _1f.target.className = _1f.target.className.replace(/\s?wf2_invalid/, "")
                        }
                    }
                }, 500);
                $wf2._45 = setTimeout($wf2._49, 4000)
            }
        }, _49: function () {
            clearTimeout($wf2._45);
            $wf2._45 = null;
            clearInterval($wf2._46);
            $wf2._46 = null;
            var _1f;
            while (_1f = $wf2._44[0]) {
                if (_1f.errorMsg && _1f.errorMsg.parentNode)_1f.errorMsg.parentNode.removeChild(_1f.errorMsg);
                var target = _1f.target;
                target.className = target.className.replace(/\s?wf2_invalid/, "");
                $wf2._44.shift()
            }
        }, _4a: {'type': 1, 'template': 1, 'repeat': 1, 'repeat-template': 1, 'repeat-min': 1, 'repeat-max': 1, 'repeat-start': 1, 'value': 1, 'class': 1, 'required': 1, 'pattern': 1, 'form': 1, 'autocomplete': 1, 'autofocus': 1, 'inputmode': 1, 'max': 1, 'min': 1, 'step': 1, onmoved: 1, onadded: 1, onremoved: 1, onadd: 1, onremove: 1, onmove: 1}, _4b: {'name': 1, 'class': 1, 'for': 1, 'style': 1, 'checked': 1, addRepetitionBlock: 1, addRepetitionBlockByIndex: 1, moveRepetitionBlock: 1, removeRepetitionBlock: 1, repetitionBlocks: 1, setCustomValidity: 1, checkValidity: 1, validity: 1, validationMessage: 1, willValidate: 1, wf2StepDatum: 1, wf2Value: 1, wf2Initialized: 1, wf2ValueLength: 1}, _4c: {onmoved: 1, onadded: 1, onremoved: 1, onadd: 1, onremove: 1, onmove: 1}, _7d: function (node, _1, _12) {
            if (!_12)_12 = 0;
            var clone, i, _4;
            switch (node.nodeType) {
                case 1:
                    var _37 = node.getAttribute('repeat') == 'template';
                    if (_37)_12++;
                    var _e = [];
                    if (node.name)_e.name = _1 ? _1(node.name) : node.name;
                    if (node.type == 'radio')_e.type = node.type;
                    if (node.checked)_e.checked = 'checked';
                    clone = $wf2._7e(node.nodeName, _e);
                    for (i = 0; _4 = node.attributes[i]; i++) {
                        if ((_4.specified || $wf2._4a[_4.name]) && !$wf2._4b[_4.name] && ((!_37 || (_12 > 1 || !$wf2._4c[_4.name])))) {
                            if (_12 < 2 && (_4.name.indexOf('on') === 0) && (typeof node[_4.name] == 'function')) {
                                var _19 = _1(node[_4.name].toString().match(/{((?:.|\n)+)}/)[1]);
                                _19 = _1(_19);
                                clone[_4.name] = new Function('event', _19)
                            } else {
                                var _8 = node.getAttribute(_4.name);
                                _8 = (_1 ? _1(_8) : _8);
                                clone.setAttribute(_4.name, _8)
                            }
                        }
                    }
                    if (node.className) {
                        var _className = (_1 ? _1(node.className) : node.className);
                        if (clone.getAttributeNode('class')) {
                            for (i = 0; i < clone.attributes.length; i++) {
                                if (clone.attributes[i].name == 'class')clone.attributes[i].value = _className
                            }
                        } else clone.setAttribute('class', _className)
                    }
                    if (!/\bdisabled\b/.test(node.className))clone.disabled = false;
                    if (node.style && node.style.cssText) {
                        clone.style.cssText = (_1 ? _1(node.style.cssText) : node.style.cssText)
                    }
                    if (node.nodeName && node.nodeName.toLowerCase() == 'label' && node.htmlFor)clone.htmlFor = (_1 ? _1(node.htmlFor) : node.htmlFor);
                    if (clone.nodeName.toLowerCase() == 'option') {
                        clone.selected = node.selected;
                        clone.defaultSelected = node.defaultSelected
                    }
                    for (i = 0; i < node.childNodes.length; i++) {
                        clone.appendChild($wf2._7d(node.childNodes[i], _1, _12))
                    }
                    break;
                case 3:
                case 4:
                    clone = document.createTextNode(node.data);
                    break;
                case 8:
                    clone = document.createComment(node.data);
                    break;
                default:
                    clone = node.cloneNode(true)
            }
            return clone
        }, _4f: function () {
            var elements = [];
            var _39 = $wf2._50.apply(this, ['input', 'output', 'select', 'textarea', 'button']);
            for (var i = 0; i < _39.length; i++) {
                var node = _39[i].parentNode;
                while (node && node.nodeType == 1 && node.getAttribute('repeat') != 'template')node = node.parentNode;
                if (!node || node.nodeType != 1)elements.push(_39[i])
            }
            return elements
        }, _62: function (el) {
            var uri = el.data || el.getAttribute('data');
            if (!uri)return null;
            var doc = null, _2f;
            try {
                if (_2f = uri.match(/^data:[^,]*xml[^,]*,((?:.|\n)+)/)) {
                    var xml = decodeURI(_2f[1].replace(/%3D/ig, '=').replace(/%3A/ig, ':').replace(/%2F/ig, '/'));
                    if (window.DOMParser) {
                        var parser = new DOMParser();
                        doc = parser.parseFromString(xml, 'text/xml')
                    } else if (window.ActiveXObject) {
                        doc = new ActiveXObject("Microsoft.XMLDOM");
                        doc.async = 'false';
                        doc.loadXML(xml)
                    }
                } else {
                    $wf2._0.open('GET', uri, false);
                    $wf2._0.send(null);
                    doc = $wf2._0.responseXML
                }
            } catch (e) {
                return null
            }
            return doc
        }, _50: function () {
            var els, i, _1e = [];
            if (document.evaluate) {
                var _tagNames = [];
                for (i = 0; i < arguments.length; i++)_tagNames.push(".//" + arguments[i]);
                els = document.evaluate(_tagNames.join('|'), this, null, 7, null);
                for (i = 0; i < els.snapshotLength; i++)_1e.push(els.snapshotItem(i))
            } else {
                for (i = 0; i < arguments.length; i++) {
                    els = this.getElementsByTagName(arguments[i]);
                    for (var j = 0; j < els.length; j++) {
                        _1e.push(els[j])
                    }
                }
                if ($wf2._69)_1e.sort($wf2._69)
            }
            return _1e
        }, _51: function (_38, _3, _8, _35) {
            var els, el, i, j, _1e = [];
            if (document.evaluate) {
                var _3b = '';
                if (_3)_3b = '[@' + _3 + (_8 ? (_35 ? '!=' : '=') + '"' + _8 + '"' : "") + "]";
                var xPaths = [];
                for (i = 0; i < _38.length; i++)xPaths.push('.//' + _38[i] + _3b);
                els = document.evaluate(xPaths.join('|'), this, null, 7, null);
                for (i = 0; i < els.snapshotLength; i++)_1e.push(els.snapshotItem(i))
            } else {
                for (i = 0; i < _38.length; i++) {
                    els = this.getElementsByTagName(_38[i]);
                    for (j = 0; el = els[j]; j++) {
                        var thisAttrNode = el.getAttributeNode(_3);
                        var _3e = el.getAttribute(_3);
                        if (!_3 || (thisAttrNode && (_8 === undefined || (_35 ? _3e != _8 : _3e == _8)))) {
                            _1e.push(el)
                        }
                    }
                }
                if ($wf2._69)_1e.sort($wf2._69)
            }
            return _1e
        }, _52: function (arr, item) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] == item)return true
            }
            return false
        }, _53: function (el, _74) {
            if (el.currentStyle)return el.currentStyle[_74]; else if (window.getComputedStyle)return getComputedStyle(el, '').getPropertyValue(_74); else if (el.style)return el.style[_74]; else return''
        }, _7e: (function () {
            try {
                var el = document.createElement('<div name="foo">');
                if (el.tagName.toLowerCase() != 'div' || el.name != 'foo')throw'create element error';
                return function (tag, _e) {
                    var html = '<' + tag;
                    for (var name in _e)html += ' ' + name + '="' + _e[name] + '"';
                    html += '>';
                    if (tag.toLowerCase() != 'input')html += '</' + tag + '>';
                    return document.createElement(html)
                }
            } catch (err) {
                return function (tag, _e) {
                    var el = document.createElement(tag);
                    for (var name in _e)el.setAttribute(name, _e[name]);
                    return el
                }
            }
        })(), _69: (function () {
            var n = document.documentElement.firstChild;
            if (n.sourceIndex) {
                return function (a, b) {
                    return a.sourceIndex - b.sourceIndex
                }
            } else if (n.compareDocumentPosition) {
                return function (a, b) {
                    return 3 - (a.compareDocumentPosition(b) & 6)
                }
            }
        })(), _48: function (text) {
            var li = document.createElement('li');
            li.appendChild(document.createTextNode(text));
            return li
        }, _55: /^(?:(\d\d\d\d)-(W(0[1-9]|[1-4]\d|5[0-2])|(0\d|1[0-2])(-(0\d|[1-2]\d|3[0-1])(T(0\d|1\d|2[0-4]):([0-5]\d)(:([0-5]\d)(\.(\d+))?)?(Z)?)?)?)|(0\d|1\d|2[0-4]):([0-5]\d)(:([0-5]\d)(\.(\d+))?)?)$/, _56: function (str, type) {
            var d = $wf2._57(str, type);
            if (!d)return null;
            var date = new Date(0);
            var _timePos = 8;
            if (d[15]) {
                if (type && type != 'time')return null;
                _timePos = 15
            } else {
                date.setUTCFullYear(d[1]);
                if (d[3]) {
                    if (type && type != 'week')return null;
                    date.setUTCDate(date.getUTCDate() + ((8 - date.getUTCDay()) % 7) + (d[3] - 1) * 7);
                    return date
                } else {
                    date.setUTCMonth(d[4] - 1);
                    if (d[6])date.setUTCDate(d[6])
                }
            }
            if (d[_timePos + 0])date.setUTCHours(d[_timePos + 0]);
            if (d[_timePos + 1])date.setUTCMinutes(d[_timePos + 1]);
            if (d[_timePos + 2])date.setUTCSeconds(d[_timePos + 3]);
            if (d[_timePos + 4])date.setUTCMilliseconds(Math.round(Number(d[_timePos + 4]) * 1000));
            if (d[4] && d[_timePos + 0] && !d[_timePos + 6])date.setUTCMinutes(date.getUTCMinutes() + date.getTimezoneOffset());
            return date
        }, _57: function (value, type) {
            var _b = false;
            var d = $wf2._55.exec(value);
            if (!d || !type)return d;
            type = type.toLowerCase();
            if (type == 'week')_b = (d[2].toString().indexOf('W') === 0); else if (type == 'time')_b = !!d[15]; else if (type == 'month')_b = !d[5]; else {
                if (d[6]) {
                    var date = new Date(d[1], d[4] - 1, d[6]);
                    if (date.getMonth() != d[4] - 1)_b = false; else switch (type) {
                        case'date':
                            _b = (d[4] && !d[7]);
                            break;
                        case'datetime':
                            _b = !!d[14];
                            break;
                        case'datetime-local':
                            _b = (d[7] && !d[14]);
                            break
                    }
                }
            }
            return _b ? d : null
        }, _58: function (num, pad) {
            if (!pad)pad = 2;
            var str = num.toString();
            while (str.length < pad)str = '0' + str;
            return str
        }, _59: function (date, type) {
            type = String(type).toLowerCase();
            var ms = '';
            if (date.getUTCMilliseconds())ms = '.' + $wf2._58(date.getUTCMilliseconds(), 3).replace(/0+$/, '');
            switch (type) {
                case'date':
                    return date.getUTCFullYear() + '-' + $wf2._58(date.getUTCMonth() + 1) + '-' + $wf2._58(date.getUTCDate());
                case'datetime-local':
                    return date.getFullYear() + '-' + $wf2._58(date.getMonth() + 1) + '-' + $wf2._58(date.getDate()) + 'T' + $wf2._58(date.getHours()) + ':' + $wf2._58(date.getMinutes()) + ':' + $wf2._58(date.getMinutes()) + ms + 'Z';
                case'month':
                    return date.getUTCFullYear() + '-' + $wf2._58(date.getUTCMonth() + 1);
                case'week':
                    var week1 = $wf2._56(date.getUTCFullYear() + '-W01');
                    return date.getUTCFullYear() + '-W' + $wf2._58(((date.valueOf() - week1.valueOf()) / (7 * 24 * 60 * 60 * 1000)) + 1);
                case'time':
                    return $wf2._58(date.getUTCHours()) + ':' + $wf2._58(date.getUTCMinutes()) + ':' + $wf2._58(date.getUTCMinutes()) + ms;
                case'datetime':
                default:
                    return date.getUTCFullYear() + '-' + $wf2._58(date.getUTCMonth() + 1) + '-' + $wf2._58(date.getUTCDate()) + 'T' + $wf2._58(date.getUTCHours()) + ':' + $wf2._58(date.getUTCMinutes()) + ':' + $wf2._58(date.getUTCMinutes()) + ms + 'Z'
            }
        }, _70: function (_25) {
            var message = 'DOMException: ';
            switch (_25) {
                case 1:
                    message += 'INDEX_SIZE_ERR';
                    break;
                case 9:
                    message += 'NOT_SUPPORTED_ERR';
                    break;
                case 11:
                    message += 'INVALID_STATE_ERR';
                    break;
                case 12:
                    message += 'SYNTAX_ERR';
                    break;
                case 13:
                    message += 'INVALID_MODIFICATION_ERR';
                    break
            }
            var err = new Error(message);
            err._25 = _25;
            err.name = 'DOMException';
            err.INDEX_SIZE_ERR = 1;
            err.NOT_SUPPORTED_ERR = 9;
            err.INVALID_STATE_ERR = 11;
            err.SYNTAX_ERR = 12;
            err.INVALID_MODIFICATION_ERR = 13;
            return err
        }};
        var RepetitionElement = {REPETITION_NONE: 0, REPETITION_TEMPLATE: 1, REPETITION_BLOCK: 2};
        var RepetitionEvent = {_upgradeEvent: function () {
            this.initRepetitionEvent = RepetitionEvent.initRepetitionEvent;
            this.initRepetitionEventNS = RepetitionEvent.initRepetitionEventNS
        }, initRepetitionEvent: function (_21, _28, _3f, _24) {
            if (this.initEvent)this.initEvent(_21, _28, _3f); else {
                this.type = _21;
                if (!this.preventDefault)this.preventDefault = function () {
                    this.returnValue = false
                };
                if (!this.stopPropagation)this.stopPropagation = function () {
                    this.cancelBubble = true
                }
            }
            this.element = _24;
            this.relatedNode = _24
        }, initRepetitionEventNS: function (_5a, _21, _28, _3f, _24) {
            throw Error("NOT IMPLEMENTED: RepetitionEvent.initRepetitionEventNS")
        }};
        if (window.Element && Element.prototype) {
            Element.prototype.REPETITION_NONE = 0;
            Element.prototype.REPETITION_TEMPLATE = 1;
            Element.prototype.REPETITION_BLOCK = 2;
            Element.prototype.repetitionType = 0;
            Element.prototype.repetitionIndex = 0;
            Element.prototype.repetitionTemplate = null;
            Element.prototype.repetitionBlocks = null;
            Element.prototype.repeatStart = 1;
            Element.prototype.repeatMin = 0;
            Element.prototype.repeatMax = Number.MAX_VALUE;
            Element.prototype.addRepetitionBlock = $wf2._7f;
            Element.prototype.addRepetitionBlockByIndex = $wf2._80;
            Element.prototype.moveRepetitionBlock = $wf2._82;
            Element.prototype.removeRepetitionBlock = $wf2._81
        }
        if (document.addEventListener) {
            document.addEventListener('DOMNodeInsertedIntoDocument', function (_6) {
                if (_6.target.nodeType == 1 && _6.target.hasAttribute('autofocus')) {
                    $wf2._5b(_6.target)
                }
            }, false);
            document.addEventListener('DOMAttrModified', function (_6) {
                if (_6._3 == 'autofocus') {
                    if (_6.attrChange == _6.ADDITION)$wf2._5b(_6.target); else if (_6.attrChange == _6.REMOVAL)_6.target.autofocus = false
                }
            }, false)
        }
        (function () {
            var match;
            var scripts = document.documentElement.getElementsByTagName('script');
            for (var i = 0; i < scripts.length; i++) {
                if (match = scripts[i].src.match(/^(.*)webforms2[^\/]+$/))$wf2._6f = match[1]
            }
            if (document.body) {
                $wf2.onDOMContentLoaded();
                return
            }
            var _14 = 0;
            if (document.addEventListener) {
                document.addEventListener('DOMContentLoaded', function () {
                    $wf2.onDOMContentLoaded()
                }, false);
                window.addEventListener('load', function () {
                    $wf2.onDOMContentLoaded()
                }, false);
                _14 = 1
            }
            if (/WebKit/i.test(navigator.userAgent)) {
                var _timer = setInterval(function () {
                    if (/loaded|complete/.test(document.readyState)) {
                        clearInterval(_timer);
                        delete _timer;
                        $wf2.onDOMContentLoaded()
                    }
                }, 10);
                _14 = 1
            } else if (/MSIE/i.test(navigator.userAgent) && !document.addEventListener && window.attachEvent) {
                window.attachEvent('onload', function () {
                    $wf2.onDOMContentLoaded()
                });
                document.write("<script defer src='" + $wf2._6f + "webforms2-msie.js'><" + "/script>");
                document.write("<scr" + "ipt id='__wf2_ie_onload' defer src='//:'><\/script>");
                var script = document.getElementById('__wf2_ie_onload');
                script.onreadystatechange = function () {
                    if (this.readyState == 'complete') {
                        this.parentNode.removeChild(this);
                        $wf2.onDOMContentLoaded();
                        if ($wf2._13.length == 0)$wf2._5c = false
                    }
                };
                script = null;
                _14 = 1
            }
            if (!_14) {
                if (window.onload) {
                    var oldonload = window.onload;
                    window.onload = function () {
                        $wf2.onDOMContentLoaded();
                        oldonload()
                    }
                } else window.onload = function () {
                    $wf2.onDOMContentLoaded()
                }
            }
        })()
    } else if (document.addEventListener && ($wf2.oldRepetitionEventModelEnabled === undefined || $wf2.oldRepetitionEventModelEnabled)) {
        $wf2.oldRepetitionEventModelEnabled = true;
        (function () {
            var _1a = {added: 'onadd', removed: 'onremove', moved: 'onmove'};

            function _18(_6) {
                if (!$wf2.oldRepetitionEventModelEnabled)return;
                if (!_6.element && _6.relatedNode)_6.element = _6.relatedNode;
                if (!_6.element || !_6.element.repetitionTemplate)return;
                var rt = _6.element.repetitionTemplate;
                var _3 = 'on' + _6.type;
                var _2d = rt.getAttribute(_3) || rt.getAttribute(_1a[_6.type]);
                if (_2d && (!rt[_3] || typeof rt[_3] != 'function'))rt[_3] = new Function('event', _2d);
                if (_6.element.repetitionTemplate[_3])_6.element.repetitionTemplate[_3](_6); else if (_6.element.repetitionTemplate[_1a[_6.type]])_6.element.repetitionTemplate[_1a[_6.type]](_6)
            }

            document.addEventListener('added', _18, false);
            document.addEventListener('removed', _18, false);
            document.addEventListener('moved', _18, false)
        })()
    }
}