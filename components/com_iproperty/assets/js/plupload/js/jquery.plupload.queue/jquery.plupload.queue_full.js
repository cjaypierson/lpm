(function (c) {
    var d = {};

    function a(e) {
        return plupload.translate(e) || e
    }
    function b(f, e) {
        e.contents()
            .each(function (g, h) {
            h = c(h);
            if (!h.is(".plupload")) {
                h.remove()
            }
        });
        e.prepend('<div class="plupload_wrapper plupload_scroll"><div id="' + f + '_container" class="plupload_container"><div class="plupload"><div class="plupload_header"><div class="plupload_header_content"><div class="plupload_header_title">' + a("Select files") + '</div><div class="plupload_header_text">' + a("Add files to the upload queue and click the start button.") + '</div></div></div><div class="plupload_content"><div class="plupload_filelist_header"><div class="plupload_file_name">' + a("Filename") + '</div><div class="plupload_file_action">&#160;</div><div class="plupload_file_status"><span>' + a("Status") + '</span></div><div class="plupload_file_size">' + a("Size") + '</div><div class="plupload_clearer">&#160;</div></div><ul id="' + f + '_filelist" class="plupload_filelist"></ul><div class="plupload_filelist_footer"><div class="plupload_file_name"><div class="plupload_buttons"><a href="#" class="plupload_button plupload_add">' + a("Add files") + '</a><a href="#" class="plupload_button plupload_start">' + a("Start upload") + '</a></div><span class="plupload_upload_status"></span></div><div class="plupload_file_action"></div><div class="plupload_file_status"><span class="plupload_total_status">0%</span></div><div class="plupload_file_size"><span class="plupload_total_file_size">0 b</span></div><div class="plupload_progress"><div class="plupload_progress_container"><div class="plupload_progress_bar"></div></div></div><div class="plupload_clearer">&#160;</div></div></div></div></div><input type="hidden" id="' + f + '_count" name="' + f + '_count" value="0" /></div>')
    }
    c.fn.pluploadQueue = function (e) {
        if (e) {
            this.each(function () {
                var j, i, k;
                i = c(this);
                k = i.attr("id");
                if (!k) {
                    k = plupload.guid();
                    i.attr("id", k)
                }
                j = new plupload.Uploader(c.extend({
                    dragdrop: true,
                    container: k
                }, e));
                d[k] = j;

                function h(l) {
                    var n;
                    if (l.status == plupload.DONE) {
                        n = "plupload_done"
                    }
                    if (l.status == plupload.FAILED) {
                        n = "plupload_failed"
                    }
                    if (l.status == plupload.QUEUED) {
                        n = "plupload_delete"
                    }
                    if (l.status == plupload.UPLOADING) {
                        n = "plupload_uploading"
                    }
                    var m = c("#" + l.id)
                        .attr("class", n)
                        .find("a")
                        .css("display", "block");
                    if (l.hint) {
                        m.attr("title", l.hint)
                    }
                }
                function f() {
                    c("span.plupload_total_status", i)
                        .html(j.total.percent + "%");
                    c("div.plupload_progress_bar", i)
                        .css("width", j.total.percent + "%");
                    c("span.plupload_upload_status", i)
                        .text(a("Uploaded %d/%d files")
                        .replace(/%d\/%d/, j.total.uploaded + "/" + j.files.length))
                }
                function g() {
                    var m = c("ul.plupload_filelist", i)
                        .html(""),
                        n = 0,
                        l;
                    c.each(j.files, function (p, o) {
                        l = "";
                        if (o.status == plupload.DONE) {
                            if (o.target_name) {
                                l += '<input type="hidden" name="' + k + "_" + n + '_tmpname" value="' + plupload.xmlEncode(o.target_name) + '" />'
                            }
                            l += '<input type="hidden" name="' + k + "_" + n + '_name" value="' + plupload.xmlEncode(o.name) + '" />';
                            l += '<input type="hidden" name="' + k + "_" + n + '_status" value="' + (o.status == plupload.DONE ? "done" : "failed") + '" />';
                            n++;
                            c("#" + k + "_count")
                                .val(n)
                        }
                        m.append('<li id="' + o.id + '"><div class="plupload_file_name"><span>' + o.name + '</span></div><div class="plupload_file_action"><a href="#"></a></div><div class="plupload_file_status">' + o.percent + '%</div><div class="plupload_file_size">' + plupload.formatSize(o.size) + '</div><div class="plupload_clearer">&#160;</div>' + l + "</li>");
                        h(o);
                        c("#" + o.id + ".plupload_delete a")
                            .click(function (q) {
                            c("#" + o.id)
                                .remove();
                            j.removeFile(o);
                            q.preventDefault()
                        })
                    });
                    c("span.plupload_total_file_size", i)
                        .html(plupload.formatSize(j.total.size));
                    if (j.total.queued === 0) {
                        c("span.plupload_add_text", i)
                            .text(a("Add files."))
                    } else {
                        c("span.plupload_add_text", i)
                            .text(j.total.queued + " files queued.")
                    }
                    c("a.plupload_start", i)
                        .toggleClass("plupload_disabled", j.files.length == (j.total.uploaded + j.total.failed));
                    m[0].scrollTop = m[0].scrollHeight;
                    f();
                    if (!j.files.length && j.features.dragdrop && j.settings.dragdrop) {
                        c("#" + k + "_filelist")
                            .append('<li class="plupload_droptext">' + a("Drag files here.") + "</li>")
                    }
                }
                j.bind("UploadFile", function (l, m) {
                    c("#" + m.id)
                        .addClass("plupload_current_file")
                });
                j.bind("Init", function (l, m) {
                    b(k, i);
                    if (!e.unique_names && e.rename) {
                        c("#" + k + "_filelist div.plupload_file_name span", i)
                            .live("click", function (s) {
                            var q = c(s.target),
                                o, r, n, p = "";
                            o = l.getFile(q.parents("li")[0].id);
                            n = o.name;
                            r = /^(.+)(\.[^.]+)$/.exec(n);
                            if (r) {
                                n = r[1];
                                p = r[2]
                            }
                            q.hide()
                                .after('<input type="text" />');
                            q.next()
                                .val(n)
                                .focus()
                                .blur(function () {
                                q.show()
                                    .next()
                                    .remove()
                            })
                                .keydown(function (u) {
                                var t = c(this);
                                if (u.keyCode == 13) {
                                    u.preventDefault();
                                    o.name = t.val() + p;
                                    q.text(o.name);
                                    t.blur()
                                }
                            })
                        })
                    }
                    c("a.plupload_add", i)
                        .attr("id", k + "_browse");
                    l.settings.browse_button = k + "_browse";
                    if (l.features.dragdrop && l.settings.dragdrop) {
                        l.settings.drop_element = k + "_filelist";
                        c("#" + k + "_filelist")
                            .append('<li class="plupload_droptext">' + a("Drag files here.") + "</li>")
                    }
                    c("#" + k + "_container")
                        .attr("title", "Using runtime: " + m.runtime);
                    c("a.plupload_start", i)
                        .click(function (n) {
                        if (!c(this)
                            .hasClass("plupload_disabled")) {
                            j.start()
                        }
                        n.preventDefault()
                    });
                    c("a.plupload_stop", i)
                        .click(function (n) {
                        n.preventDefault();
                        j.stop()
                    });
                    c("a.plupload_start", i)
                        .addClass("plupload_disabled")
                });
                j.init();
                j.bind("Error", function (l, o) {
                    var m = o.file,
                        n;
                    if (m) {
                        n = o.message;
                        if (o.details) {
                            n += " (" + o.details + ")"
                        }
                        if (o.code == plupload.FILE_SIZE_ERROR) {
                            alert(a("Error: File too large: ") + m.name)
                        }
                        if (o.code == plupload.FILE_EXTENSION_ERROR) {
                            alert(a("Error: Invalid file extension: ") + m.name)
                        }
                        m.hint = n;
                        c("#" + m.id)
                            .attr("class", "plupload_failed")
                            .find("a")
                            .css("display", "block")
                            .attr("title", n)
                    }
                });
                j.bind("StateChanged", function () {
                    if (j.state === plupload.STARTED) {
                        c("li.plupload_delete a,div.plupload_buttons", i)
                            .hide();
                        c("span.plupload_upload_status,div.plupload_progress,a.plupload_stop", i)
                            .css("display", "block");
                        c("span.plupload_upload_status", i)
                            .text("Uploaded " + j.total.uploaded + "/" + j.files.length + " files");
                        if (e.multiple_queues) {
                            c("span.plupload_total_status,span.plupload_total_file_size", i)
                                .show()
                        }
                    } else {
                        g();
                        c("a.plupload_stop,div.plupload_progress", i)
                            .hide();
                        c("a.plupload_delete", i)
                            .css("display", "block")
                    }
                });
                j.bind("QueueChanged", g);
                j.bind("FileUploaded", function (l, m) {
                    h(m)
                });
                j.bind("UploadProgress", function (l, m) {
                    c("#" + m.id + " div.plupload_file_status", i)
                        .html(m.percent + "%");
                    h(m);
                    f();
                    if (e.multiple_queues && j.total.uploaded + j.total.failed == j.files.length) {
                        c(".plupload_buttons,.plupload_upload_status", i)
                            .css("display", "inline");
                        c(".plupload_start", i)
                            .addClass("plupload_disabled");
                        c("span.plupload_total_status,span.plupload_total_file_size", i)
                            .hide()
                    }
                });
                if (e.setup) {
                    e.setup(j)
                }
            });
            return this
        } else {
            return d[c(this[0])
                .attr("id")]
        }
    }
})(jQuery);