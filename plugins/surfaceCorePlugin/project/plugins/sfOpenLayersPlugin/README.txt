How to setup geometry fields on a database schema:

- Set 'BasePeer' method in table's schema to 'GeometryBasePeer'
and 'phpType' of geometry fields to 'geometry'

    ex : <table name="test" basePeer="GeometryBasePeer">
            ...
            <column name="the_geom" type="LONGVARCHAR" phpType="geometry" />
            ...
        </table>
