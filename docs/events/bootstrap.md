# Events: Bootstrap

Actions to perform in order to bootstrap the application.

| Subscriber (method)                             | Event           | Priority |
|-------------------------------------------------|-----------------|----------|
| [modifyResponseHeaders](#modifyresponseheaders) | `app.bootstrap` | 5        |
| [sampleGreeting](#samplegreeting)               | `app.http`      | 5        |

## modifyResponseHeaders

Add Bones values to the [HTTP response](https://github.com/bayfrontmedia/bones/blob/master/docs/services/response.md) headers.

The following headers are added:

- `X-Application`
- `X-Application-Version`

## sampleGreeting

This method returns a sample response confirmation that Bones is successfully installed.
If handling HTTP requests, this would typically be removed in favor of using a router.