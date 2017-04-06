Passwd
---
A simple Bolt extension to password protect a page via basic auth.

## Usage

Use the twig function `passwd` and everything after it will require valid basic auth to rendered.

`{{ passwd('username', 'password', 'Protected Page') }}`


## License
This Bolt extension is open-sourced software licensed under the GPL-3.0
