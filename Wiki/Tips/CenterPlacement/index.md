---
title: Center Placement of Windows
type: tip
description: |
  Various ways to center a window.

---

# Centring Windows

A very easy function to center your window without any hardcoded screen height and width:

{% fvwm2rc %}
DestroyFunc CenterWindow
AddToFunc   CenterWindow
+ I ThisWindow Piperead "echo Move \
    $(( $[vp.width]/2-$[w.width]/2 ))p \
    $(( $[vp.height]/2-$[w.height]/2 ))p"

Key KP\_Begin A 4 CenterWindow
{% endfvwm2rc %}

Note that in Fvwm >=2.5.12, one can use a default style ''CenterPlacement'', hence:

{% fvwm2rc %}
Style myapp CenterPlacement
{% endfvwm2rc %}

And with FVWM >=2.5.27, the CenterPlacement style was folded into the
PositionPlacement style option, hence:

{% fvwm2rc %}
Style myapp PositionPlacement center
{% endfvwm2rc %}

If the window still doesn't follow correctly, try to disable PPosition and USPosition:

{% fvwm2rc %}
Style myapp PositionPlacement center, NoPPosition, NoUSPosition
{% endfvwm2rc %}

