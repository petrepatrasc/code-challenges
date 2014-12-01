# Working with Tags and Compiler Passes

Goal of this project is to create a customisable data migration bundle,
that can import a dataset of XMLs (from a legacy application) into a new application.

A bridge bundle will also be built, in order to overwrite
some of the internals of the original bundle, and to also add its
own features.

Finally, a simple application bundle will be built, in order to support
using the two migration bundles.

## Plan

1. Create a MigrationBundle to handle initial import operations.
    1. Create three basic XML files.
    2. Create entities for XML files.
    3. Create serialize services.
    4. Add compiler pass for services.
    5. Add command for actual data import.
    6. Add configuration options for folder from which data should be imported.
    7. Dispatch event when data entity has been imported.
2. Create a MigrationBridgeBundle to bridge things together.
    1. Add a new service to use with the previous compiler pass.
    2. Catch events from MigrationBundle, persist them in the final entities (present in ApiBundle).
3. Create an ApiBundle to show the results.
    1. Create final result entities.
    2. Add options for displaying result entities.