addComment = {
    moveForm: function(d, f, i, c) {
        var m = this,
            a, h = m.I(d),
            b = m.I(i),
            l = m.I("cancel-comment-reply-link"),
            j = m.I("parent_id"),
            k = m.I("comment_post_ID");
        if (!h || !b || !l || !j) {
			alert(1);
            return
        }
        m.respondId = i;
        c = c || false;
        if (!m.I("wp-temp-form-div")) {
            a = document.createElement("div");
            a.id = "wp-temp-form-div";
            a.style.display = "none";
            b.parentNode.insertBefore(a, b)
        }
        h.parentNode.insertBefore(b, h.nextSibling);
        if (k && c) {
            k.value = c
        }
        j.value = f;
        l.style.display = "";
        l.onclick = function() {
            var n = addComment,
                e = n.I("wp-temp-form-div"),
                o = n.I(n.respondId);
            if (!e || !o) {
                return
            }
            n.I("parent_id").value = "0";
            e.parentNode.insertBefore(o, e);
            e.parentNode.removeChild(e);
            this.style.display = "none";
            this.onclick = null;
            return false
        };
        try {
            m.I("comment").focus()
        } catch (g) {}
        return false
    },
    I: function(a) {
        return document.getElementById(a)
    }
};