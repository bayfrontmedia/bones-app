# Events: Bootstrap

The Bootstrap event subscriber exists to subscribe to events necessary to bootstrap the application,
typically to perform tasks on every request.

| Subscriber (method)                             | Event           | Priority |
|-------------------------------------------------|-----------------|----------|
| [modifyResponseHeaders](#modifyresponseheaders) | `app.bootstrap` | 5        |
| [sampleGreeting](#samplegreeting)               | `app.http`      | 5        |

## modifyResponseHeaders

This method exists to modify the headers sent whenever the [response service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/response.md) sends.

The following headers are added:

- `X-Application`
- `X-Application-Version`

## sampleGreeting

This method returns a sample response confirmation that Bones is successfully installed.
If handling HTTP requests, this would typically be removed in favor of using a router.