Taming problematic application windows
======================================

#### I'm having problems giving Wine windows focus.

  This is a known issue.  The ICCCM states that windows that take
  input should indicate so in their WM hints.  Wine windows don't do
  this.  To work around this issue try:

    Style "*" Lenience

#### I use XMMS, but it ignores some window styles.

  Please refer to Q0.2.


